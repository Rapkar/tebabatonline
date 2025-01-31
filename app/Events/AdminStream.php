<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
// use Laravel\Reverb\Protocols\Pusher\Channels\PrivateChannel;

class AdminStream implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $userId;

    /**
     * Create a new event instance.
     *
     * @param int $userId
     * @param mixed $message
     */
    public function __construct($userId, $message)
    {
        $this->userId = $userId; // Store userId for broadcasting channel
        $this->message = $message; // Store message for broadcasting
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('admin.' . $this->userId), // Corrected channel name
        ];
    }
}
