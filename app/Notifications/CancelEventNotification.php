<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CancelEventNotification extends Notification
{
    use Queueable;

    public $user;
    public $event;

    public function __construct(object $user, object $event)
    {
        $this->user = $user;
        $this->event = $event;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'User '. $this->user . ' canceled event' . $this->event  . ''
        ];
    }
}