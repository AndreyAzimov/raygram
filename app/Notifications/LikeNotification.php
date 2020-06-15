<?php

namespace App\Notifications;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LikeNotification extends Notification
{
    use Queueable;

    public $user;
    public $post;

    /**
     * Create a new notification instance.
     *
     * @param User $post_liked_by_user
     * @param Post $post
     */
    public function __construct(User $post_liked_by_user, Post $post)
    {
        $this->post = $post;
        $this->user = $post_liked_by_user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'post_liked_by' => $this->user->name,
            'post' => $this->post->image,
            'url' => $this->post->id
        ];
    }
}
