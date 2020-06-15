<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileAvatarUpload extends Component
{
    use WithFileUploads;

    public $avatar;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => ['image', 'mimes:jpeg,png,jpg,tiff,bmp', 'max:5120']
        ]);
    }

    public function clear()
    {
        $this->avatar =  null;
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.profile-avatar-upload');
    }
}
