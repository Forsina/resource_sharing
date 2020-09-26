<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'avatar_path'
    ];

    protected $hidden = [
        'password', 'remember_token', 'email',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

    public function lastReply()
    {
        return $this->hasOne(Reply::class)->latest();
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function isAdmin()
    {
        return in_array($this->name, ['Frosina', 'Aleksandar']);
    }

    public function read($thread)
    {
        cache()->forever(
            $this->visitedThreadCacheKey($thread),
            Carbon::now()
        );
    }

    public function getAvatarPathAttribute($avatar)
    {
        return asset($avatar ?: 'images/avatars/default.png');
        //return  asset(\Storage::Url($avatar ?: 'images/avatars/default.png'));
        //use Illuminate\Support\Facades\Storage;
    }

    public function visitedThreadCacheKey($thread)
    {
        return sprintf("users.%s.visits.%s", $this->id, $thread->id);
    }
}