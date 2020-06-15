<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class ProfileStats extends Component
{

    public $user;

    protected $listeners = [
        'statsChanged' => '$refresh',
    ];

    public function mount(User $user)
    {
        $this->user=$user;
    }

    public function render()
    {
        return view('livewire.profile.profile-stats');
    }
}
