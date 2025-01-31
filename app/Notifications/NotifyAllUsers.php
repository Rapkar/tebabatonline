<?php

namespace App\Notifications;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notification;
use Illuminate\Broadcasting\InteractsWithSockets;

class NotifyAllUsers extends Notification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;

    public function __construct($message)
    {
        $this->message = $message; // Store the message to be broadcasted
    }

    public function broadcastOn()
    {
        return new Channel('channel_for_er'); // Specify the channel for broadcasting
    }    
    public function broadcastAs()
    {
      return 'message.sent';
    }
}
