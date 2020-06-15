<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['image', 'caption', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'liked_post_id', 'User_id')->withTimestamps();
    }

    public function totalLikes()
    {
        return $this->likes()->count();
    }
}
