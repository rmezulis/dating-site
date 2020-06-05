<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'password', 'settings'
    ];

    protected $attributes = [
        'settings' => '{"from_age":"18","to_age":"99","gender":["male","female"]}'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function likes()
    {
        return $this->belongsToMany(
            User::class,
            'likes',
            'user_id',
            'judged_id'
        )->withPivot('like');
    }

    public function matchedWith()
    {
        return $this->belongsToMany(
            User::class,
            'matches',
            'user_id',
            'match_id'
        );
    }

    public function matchedBy()
    {
        return $this->belongsToMany(
            User::class,
            'matches',
            'match_id',
            'user_id'
        );
    }
}
