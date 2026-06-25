<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Mark all unread notifications as read.
     */
    public function markAllAsRead()
    {
        $user = Auth::guard('pelanggan')->user();
        
        if ($user) {
            $user->unreadNotifications->markAsRead();
        }

        return back();
    }

    /**
     * Mark one notification as read, then redirect to its URL (or back).
     */
    public function markOneAsRead(string $id)
    {
        $user = Auth::guard('pelanggan')->user();

        if (!$user) {
            return back();
        }

        $notification = $user->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            $redirectUrl = $notification->data['url'] ?? null;
            if ($redirectUrl) {
                return redirect($redirectUrl);
            }
        }

        return back();
    }
}
