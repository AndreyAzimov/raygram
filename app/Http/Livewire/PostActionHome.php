<?php

namespace App\Http\Livewire;

use App\Events\Liked;
use App\Post;
use Livewire\Component;

class PostActionHome extends Component
{

    public $post;
    public $postAlreadyLike;
    public $user;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->user = auth()->user();
        $this->user->ifLiked($this->post) ? $this->postAlreadyLike = true : $this->postAlreadyLike = false;
    }

    public function likeToggle()
    {
        $this->postAlreadyLike ? $this->unlike() : $this->like();
        $this->toggle();
    }

    public function render()
    {
        return view('livewire.home.post-action-home');
    }

    private function like()
    {
        $this->user->like($this->post);

        if ($this->user->id != $this->post->user->id){
            event(new Liked($this->user, $this->post));
        }
    }

    private function unlike()
    {
        $this->user->unlike($this->post);
    }

    private function toggle(){
        $this->emit('statsChanged');
        $this->postAlreadyLike = !$this->postAlreadyLike;
    }
}
