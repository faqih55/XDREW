<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$app->make(\Illuminate\Foundation\Bootstrap\BootProviders::class)->bootstrap($app);
$app->make(\Illuminate\Foundation\Bootstrap\RegisterProviders::class)->bootstrap($app);

use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;

$user = Pelanggan::first();
Auth::guard('pelanggan')->login($user);

$controller = app()->make(\App\Http\Controllers\CheckoutController::class);

$request = \Illuminate\Http\Request::create('/checkout/process', 'POST', [
    'nama_penerima' => 'Test User',
    'nomor_telepon' => '08123456789',
    'provinsi' => 'DIY',
    'kota' => 'Kota Yogyakarta',
    'alamat_lengkap' => 'Jl. Malioboro',
    'metode_pembayaran' => 'Transfer Bank',
    'total_pembayaran' => 150000,
    'produk_id' => '1',
    'is_beli_langsung' => 'true',
    'jumlah' => 1,
    'ukuran' => 'M'
]);

try {
    $response = $controller->process($request);
    echo "Response:\n";
    echo $response->getContent();
} catch (\Exception $e) {
    echo "Exception:\n" . $e->getMessage() . "\n" . $e->getTraceAsString();
}
