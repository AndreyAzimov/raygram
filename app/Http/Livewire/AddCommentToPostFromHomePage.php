<?php

namespace App\Http\Livewire;

use App\Comment;
use App\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class AddCommentToPostFromHomePage extends Component
{
    use AuthorizesRequests;

    public $post;
    public $comment;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.home.add-comment-to-post-from-home-page');
    }

    public function addComment()
    {
        $this->validate([
            'comment' => ['required']
        ]);

        $this->commentPut();

    }

    private function commentPut()
    {
        if (Gate::inspect('create', Comment::class)->allowed()) {

            $this->post->comment()->create([
                'body' => $this->comment,
                'commented_by' => auth()->id()
            ]);

            $this->emit('statsChanged');
            $this->comment = null;

        } else {
            dd(Gate::inspect('create', Comment::class)
                ->message());
        }
    }

}
