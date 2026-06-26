<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SystemNotification extends Notification
{
    use Queueable;

    protected $title;
    protected $message;
    protected $icon;
    protected $color;
    protected $url;
    protected $image; // Parameter baru untuk gambar

    public function __construct($title, $message, $icon = 'notifications', $color = '#4edea3', $url = null, $image = null)
    {
        $this->title   = $title;
        $this->message = $message;
        $this->icon    = $icon;
        $this->color   = $color;
        $this->url     = $url;
        $this->image   = $image; // Simpan gambar
    }

    public function via($notifiable)
    {
        return ['database']; // Menyimpan notifikasi di database
    }

    public function toDatabase($notifiable)
    {
        return [
            'title'   => $this->title,
            'message' => $this->message,
            'icon'    => $this->icon,
            'color'   => $this->color,
            'url'     => $this->url,
            'image'   => $this->image, // Simpan path gambar ke kolom 'data'
        ];
    }
}