<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable, Followable, Likeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class)->latest();
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create([
                'avatar' => 'default.svg',
                'url' => 'N/A',
                'bio' => 'Profile not set.'
            ]);
        });
    }

    public function home()
    {
        $followingUsers = $this->followings->pluck('id')->push($this->id);
        return Post::query()
            ->whereIn('user_id', $followingUsers)
            ->with('user', 'user.profile', 'comment', 'comment.user', 'likes')
            ->latest()
            ->paginate(20);
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'commented_by');
    }

    public function clearNotifications()
    {
        DB::table('notifications')->where('notifiable_id', $this->id)->delete();
    }


}
