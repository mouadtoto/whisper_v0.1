<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $messageContent;
    public $from;

    /**
     * Create a new event instance.
     *
     * @param  string $messageContent
     * @param  User $from
     * @return void
     */
    public function __construct(string $messageContent, User $from)
    {
        $this->messageContent = $messageContent;
        $this->from = $from;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array
     */
    public function broadcastOn(): array
    {
        // Broadcast to a private channel named after the sender's user ID
        return [new PrivateChannel('chat.' . $this->from->id)];
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        // Return the message content and user information
        return [
            'message' => $this->messageContent,
            'user' => $this->from->only(['name', 'email']),
        ];
    }

    /**
     * Get the event name for the broadcast channel.
     *
     * @return string
     */
    public function broadcastAs(): string
    {
        // Customize the event name
        return 'new-message';
    }
}
