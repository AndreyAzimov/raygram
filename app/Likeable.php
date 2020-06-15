<?php


namespace App;


trait Likeable
{
    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'liked_post_id')->withTimestamps();
    }

    public function like(Post $post)
    {
        return $this->likes()->save($post);
    }

    public function unlike(Post $post)
    {
        return $this->likes()->detach($post);
    }

    public function ifliked(Post $post)
    {
        return $this->likes()->where('liked_post_id', $post->id)->exists();
    }
}
