<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class NotificationDropDown extends Component
{
    public $user;
    public $unreadNotifications;
    public $unreadNotificationsCount = 0;
    public $notifications;
    public $notificationsCount;

    protected $listeners = [
        'statsChanged' => '$refresh',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->unreadNotifications = $this->user->unreadNotifications;
        $this->unreadNotificationsCount = $this->user->unreadNotifications->count();

    }

    public function reload()
    {
        $this->notifications = auth()->user()->notifications;
        $this->notificationsCount = auth()->user()->notifications->count();
        $this->emit('statsChanged');
    }

    public function render()
    {
        return view('livewire.notification.notification-drop-down');
    }

    public function clearNotifications()
    {
        $this->user->clearNotifications();
        $this->notificationCount = 0;
        $this->unreadNotificationsCount = 0;
        $this->reload();
    }

    public function markAllNotificationsAsRead()
    {
        $this->user->notifications->markAsRead();
        $this->unreadNotificationsCount = 0;
        $this->reload();
    }
}
