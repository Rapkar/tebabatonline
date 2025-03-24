<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    public $receiver_id;

    public function __construct($receiver_id)
    {
        $this->receiver_id = $receiver_id;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('messages.' . $this->receiver_id);
    }
}
