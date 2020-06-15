<?php

namespace App\Http\Livewire;

use App\Events\Followed;
use App\User;
use Livewire\Component;

class FollowFromPostShow extends Component
{
    public $user;
    public $status;
    public $isFollowing;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->setIsFollowing();
        $this->isFollowing ? $this->status = 'Following' : $this->status = 'Follow';
    }

    public function toggleFollowUnfollow()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $this->isFollowing ? $this->unfollow() : $this->follow();
        return true;
    }

    public function render()
    {
        return view('livewire.follow-from-post-show');
    }

    private function follow()
    {
        auth()->user()->follow($this->user);
        event(new Followed($this->user));
        session()->flash('success', 'You are now following, ' . $this->user->name);
        $this->toggle();
    }

    private function unfollow()
    {
        auth()->user()->unfollow($this->user);
        $this->toggle();
        $this->redirect(route('profile.show', $this->user));
    }

    private function toggle()
    {
        $this->emit('statsChanged');
        $this->isFollowing = !$this->isFollowing;
        $this->isFollowing ? $this->status = 'Following' : $this->status = 'Follow';
    }

    private function setIsFollowing()
    {
        if (auth()->check()) {
            $this->isFollowing = auth()->user()->following($this->user);
        } else {
            $this->isFollowing = false;
        }
    }
}
