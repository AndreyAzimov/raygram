<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentsLikes extends Component
{
    protected $listeners = [
        'statsChanged' => '$refresh',
    ];

    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.home.comments-likes');
    }
}
