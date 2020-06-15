<?php

namespace App\Http\Livewire;

use App\Events\Followed;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Follow extends Component
{
    public $status;
    public $isFollowing;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->setIsFollowing();
        $this->isFollowing ? $this->status ='Following' : $this->status ='Follow';
    }

    public function toggleFollowUnfollow()
    {
        if (!auth()->check()){
           return redirect()->route('login');
        }
        $this->isFollowing ? $this->unfollow() : $this->follow();
        return true;
    }

    public function render()
    {
        return view('livewire.profile.follow');
    }


    private function follow(){
        auth()->user()->follow($this->user);
        event(new Followed($this->user));
        session()->flash('success', 'You are now following, '.$this->user->name);
        $this->toggle();
    }

    private function unfollow(){
        auth()->user()->unfollow($this->user);
        $this->toggle();
    }

    private function toggle(){
        $this->emit('statsChanged');
        $this->isFollowing = !$this->isFollowing;
        $this->isFollowing ? $this->status ='Following' : $this->status ='Follow';
    }

    private function setIsFollowing(){
        if (auth()->check()){
            $this->isFollowing = auth()->user()->following($this->user);
        }else{
            $this->isFollowing = false;
        }
    }
}
