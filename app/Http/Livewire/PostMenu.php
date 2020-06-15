<?php

namespace App\Http\Livewire;

use App\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class PostMenu extends Component
{
    use AuthorizesRequests;
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function delete()
    {
        try {
            $this->authorize('delete', $this->post);
        } catch (AuthorizationException $e) {
        }
        $this->post->delete();
        session()->flash('failed', 'Post Deleted');
        return redirect()->to(route('home.index'));
    }

    public function unfollow()
    {
        auth()->user()->unfollow($this->post->user);
        session()->flash('success', 'You unfollowed, '.$this->post->user->name.'.');
        return redirect()->to(route('home.index'));
    }

    public function render()
    {
        return view('livewire.post-menu');
    }
}
