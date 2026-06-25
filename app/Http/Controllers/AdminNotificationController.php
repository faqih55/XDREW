<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{

    public function index()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return response()->json(['notifications' => [], 'unread_count' => 0]);
        }

        $notifications = $admin->notifications()->latest()->take(20)->get()->map(function ($notif) {
            return [
                'id'         => $notif->id,
                'title'      => $notif->data['title']   ?? 'Notifikasi',
                'message'    => strip_tags($notif->data['message'] ?? ''),
                'icon'       => $notif->data['icon']    ?? 'notifications',
                'color'      => $notif->data['color']   ?? '#4edea3',
                'url'        => $notif->data['url']     ?? null,
                'is_unread'  => is_null($notif->read_at),
                'time'       => $notif->created_at->diffForHumans(),
                'mark_url'   => route('admin.notifications.markOne', $notif->id),
            ];
        });

        return response()->json([
            'notifications' => $notifications,
            'unread_count'  => $admin->unreadNotifications()->count(),
        ]);
    }

    public function markAllAsRead()
    {
        $admin = Auth::guard('admin')->user();

        if ($admin) {
            $admin->unreadNotifications->markAsRead();
        }

        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }
        return back();
    }

    public function markOneAsRead(string $id)
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            if (request()->wantsJson()) {
                return response()->json(['success' => false], 401);
            }
            return back();
        }

        $notification = $admin->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            $redirectUrl = $notification->data['url'] ?? null;
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success'      => true,
                    'redirect_url' => $redirectUrl,
                ]);
            }
            
            return $redirectUrl ? redirect($redirectUrl) : back();
        }

        if (request()->wantsJson()) {
            return response()->json(['success' => false], 404);
        }
        return back();
    }
}
