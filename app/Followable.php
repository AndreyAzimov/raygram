<?php


namespace App;


use Illuminate\Support\Facades\DB;

trait Followable
{

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function follow(User $user)
    {
        return $this->followings()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->followings()->detach($user);
    }

    public function following(User $user)
    {
        return $this->followings()->where('following_user_id', $user->id)->exists();
    }

    public function followerCount()
    {
        return DB::table('follows')->where('following_user_id', $this->id)->count();
    }
    public function followingCount()
    {
        return $this->followings()->count();
    }
}
