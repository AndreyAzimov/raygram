<div class="pb-2">
    @if($post->totalLikes() > 0)
        <p class="text-sm font-medium mb-2">
            {{ $post->totalLikes() }} {{ $post->totalLikes() > 1 ? 'likes' : 'like' }}
        </p>
    @endif
    @foreach($post->comment as $comment)
        <p class="text-sm"><a href="{{ route('profile.show', $comment->user->username) }}" class="font-medium ">{{ $comment->user->username }}</a> {{ $comment->body }}</p>
    @endforeach
</div>
