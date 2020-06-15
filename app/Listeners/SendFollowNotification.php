<?php

namespace App\Listeners;

use App\Notifications\FollowNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendFollowNotification
{


    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->user->notify(new FollowNotification($event->followed_by));
    }
}
