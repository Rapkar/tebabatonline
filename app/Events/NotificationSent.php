<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Bus\Queueable;

// use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Notification;

class NotificationSent extends Notification implements ShouldBroadcast
{
    use Queueable,Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }
    public function via(object $notifiable): array
    {
        return ['database'];
    }
    public function broadcastOn()
    {
        return new Channel('notifications'); // Ensure this matches what you're listening for
    }
    public function toDatabase($notifiable)
    {
        return [
            'message' =>   $this->message,
            'created_at' => now(),
        ];
    }
}
