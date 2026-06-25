<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiChatController extends Controller
{
    /**
     * System prompt untuk XDrew AI Fashion Assistant.
     */
    private function systemPrompt(): string
    {
        return <<<PROMPT
Kamu adalah **XDrew AI** — asisten fashion pribadi dari brand XDrew Fashion Indonesia.

**Tentang XDrew Fashion:**
- Brand fashion streetwear lokal Indonesia yang fokus pada sustainability dan desain mindful
- Koleksi meliputi: T-Shirt, Hoodie, Jaket, Celana Cargo, Sepatu
- Harga berkisar Rp 600.000 – Rp 7.000.000
- Tersedia ukuran: S, M, L, XL
- Warna tersedia: Hitam, Putih, Hijau, Abu-Abu
- Brand berkomitmen pada produksi ramah lingkungan dan transparan

**Tugasmu:**
- Bantu pelanggan menemukan produk yang tepat sesuai kebutuhan mereka
- Berikan rekomendasi outfit berdasarkan preferensi, kesempatan, atau musim
- Jelaskan filosofi dan nilai-nilai brand XDrew
- Bantu dengan pertanyaan tentang ukuran, warna, atau perawatan pakaian
- Arahkan pelanggan ke halaman detail produk atau checkout jika mereka tertarik
- Selalu ramah, enthusiastic, dan mencerminkan identitas brand yang modern dan mindful

**Cara menjawab:**
- Gunakan Bahasa Indonesia yang santai namun profesional
- Jawaban singkat dan to the point (maks 3-4 kalimat per respons)
- Gunakan emoji secukupnya untuk membuat percakapan lebih hidup 🌿✨
- Jika tidak tahu sesuatu, jujur dan tawarkan untuk mengarahkan ke customer service

Jangan menjawab pertanyaan di luar konteks fashion, gaya hidup, atau XDrew Fashion.
PROMPT;
    }

    /**
     * Handle AI chat request.
     */
    public function chat(Request $request)
    {
        $request->validate([
            'messages' => 'required|array',
        ]);

        $apiKey = config('services.gemini.api_key');

        if (!$apiKey) {
            return response()->json([
                'error' => '⚠️ AI Chat belum dikonfigurasi. Silakan hubungi admin.',
            ], 500);
        }

        try {
            // Build conversation history for Gemini
            $contents = [];

            foreach ($request->input('messages', []) as $msg) {
                if (isset($msg['role'], $msg['content'])) {
                    $contents[] = [
                        'role'  => $msg['role'] === 'user' ? 'user' : 'model',
                        'parts' => [['text' => $msg['content']]],
                    ];
                }
            }

            // Return streamed response using Vercel Data Stream Protocol
            return response()->stream(function () use ($apiKey, $contents) {
                // Disable server-side buffering
                if (function_exists('apache_setenv')) {
                    apache_setenv('no-gzip', '1');
                }
                ini_set('output_buffering', 'off');
                ini_set('zlib.output_compression', false);

                // Use the new x-goog-api-key header for authentication
                $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:streamGenerateContent?alt=sse';
                $postData = [
                    'system_instruction' => [
                        'parts' => [['text' => $this->systemPrompt()]],
                    ],
                    'contents'           => $contents,
                    'generationConfig'   => [
                        'maxOutputTokens' => 300,
                        'temperature'     => 0.8,
                    ],
                ];

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'x-goog-api-key: ' . $apiKey,
                ]);

                $buffer = '';
                curl_setopt($ch, CURLOPT_WRITEFUNCTION, function ($ch, $data) use (&$buffer) {
                    $buffer .= $data;
                    while (($pos = strpos($buffer, "\n")) !== false) {
                        $line = substr($buffer, 0, $pos);
                        $buffer = substr($buffer, $pos + 1);
                        $trimmedLine = trim($line);
                        
                        if (str_starts_with($trimmedLine, 'data:')) {
                            $jsonData = trim(substr($trimmedLine, 5));
                            if ($jsonData) {
                                $decoded = json_decode($jsonData, true);
                                $text = $decoded['candidates'][0]['content']['parts'][0]['text'] ?? '';
                                if ($text !== '') {
                                    // 0: prefix denotes a text delta in Vercel Data Stream Protocol
                                    echo "0:" . json_encode($text) . "\n";
                                    if (ob_get_level() > 0) {
                                        ob_flush();
                                    }
                                    flush();
                                }
                            }
                        }
                    }
                    return strlen($data);
                });

                curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                // If cURL/API returned an error code, output an error message chunk
                if ($httpCode !== 200) {
                    Log::error("Gemini API stream failed with status $httpCode. Response: " . $buffer);
                    
                    // Fallback attempt: if 401, try query parameter authentication
                    if ($httpCode === 401) {
                        $urlWithKey = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:streamGenerateContent?alt=sse&key=' . $apiKey;
                        $ch = curl_init($urlWithKey);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                            'Content-Type: application/json',
                        ]);
                        
                        $buffer = '';
                        curl_setopt($ch, CURLOPT_WRITEFUNCTION, function ($ch, $data) use (&$buffer) {
                            $buffer .= $data;
                            while (($pos = strpos($buffer, "\n")) !== false) {
                                $line = substr($buffer, 0, $pos);
                                $buffer = substr($buffer, $pos + 1);
                                $trimmedLine = trim($line);
                                
                                if (str_starts_with($trimmedLine, 'data:')) {
                                    $jsonData = trim(substr($trimmedLine, 5));
                                    if ($jsonData) {
                                        $decoded = json_decode($jsonData, true);
                                        $text = $decoded['candidates'][0]['content']['parts'][0]['text'] ?? '';
                                        if ($text !== '') {
                                            echo "0:" . json_encode($text) . "\n";
                                            if (ob_get_level() > 0) {
                                                ob_flush();
                                            }
                                            flush();
                                        }
                                    }
                                }
                            }
                            return strlen($data);
                        });
                        
                        curl_exec($ch);
                        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);
                    }
                    
                    if ($httpCode !== 200) {
                        // 3: prefix denotes an error in Vercel Data Stream Protocol
                        echo "3:" . json_encode("Maaf, saya sedang tidak bisa merespons. Coba lagi sebentar ya! 🙏") . "\n";
                        if (ob_get_level() > 0) {
                            ob_flush();
                        }
                        flush();
                    }
                }
            }, 200, [
                'Content-Type' => 'text/event-stream; charset=utf-8',
                'Cache-Control' => 'no-cache, must-revalidate',
                'Connection' => 'keep-alive',
                'X-Accel-Buffering' => 'no',
            ]);

        } catch (\Exception $e) {
            Log::error('AI Chat Exception: ' . $e->getMessage());
            // Standard JSON fallback if stream initialization fails
            return response()->json([
                'error' => 'Ups! Ada gangguan teknis. Silakan coba lagi dalam beberapa saat.',
            ], 500);
        }
    }
}
