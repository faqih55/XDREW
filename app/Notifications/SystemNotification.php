<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SystemNotification extends Notification
{
    use Queueable;

    public $title;
    public $message;
    public $icon;
    public $color;
    public $url;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        string $title,
        string $message,
        string $icon  = 'notifications',
        string $color = '#4edea3',
        ?string $url  = null
    ) {
        $this->title   = $title;
        $this->message = $message;
        $this->icon    = $icon;
        $this->color   = $color;
        $this->url     = $url;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [
            'title'   => $this->title,
            'message' => $this->message,
            'icon'    => $this->icon,
            'color'   => $this->color,
            'url'     => $this->url,
        ];
    }
}
