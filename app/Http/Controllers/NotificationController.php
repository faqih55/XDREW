<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Tandai semua notifikasi pelanggan sebagai sudah dibaca.
     */
    public function markAllAsRead()
    {
        $user = Auth::guard('pelanggan')->user();
        
        if ($user) {
            // Langsung update semua yang statusnya unread menjadi read
            $user->unreadNotifications->markAsRead();
            
            return back()->with('success', 'Semua notifikasi telah ditandai sudah dibaca.');
        }

        // Jika sesi habis, arahkan ke login
        return redirect()->route('pelanggan.login')->with('error', 'Silakan login terlebih dahulu.');
    }

    /**
     * Tandai satu notifikasi sebagai sudah dibaca, lalu arahkan ke URL tujuannya (jika ada).
     */
    public function markOneAsRead(string $id)
    {
        $user = Auth::guard('pelanggan')->user();

        if (!$user) {
            // Jika sesi habis, arahkan ke login
            return redirect()->route('pelanggan.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil notifikasi spesifik milik user yang sedang login
        $notification = $user->notifications()->where('id', $id)->first();

        if ($notification) {
            // Optimasi: Update ke database HANYA JIKA notifikasi tersebut belum dibaca
            if (is_null($notification->read_at)) {
                $notification->markAsRead();
            }
            
            // Ambil URL tujuan dari array data notifikasi
            $redirectUrl = $notification->data['url'] ?? null;
            
            if ($redirectUrl) {
                return redirect($redirectUrl);
            }
        }

        // Fallback jika tidak ada URL tujuan atau notifikasi tidak ditemukan
        return back();
    }
}