<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    public function scopeMatch($query, User $user)
    {
        return $query->where('like', true)
            ->where('user_id', $user->id)
            ->where('judged_id', auth()->user()->id);
    }
}
