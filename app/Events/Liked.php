<?php

namespace App\Events;

use App\Post;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Liked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $post;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Post $post
     */
    public function __construct(User $user, Post $post)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
