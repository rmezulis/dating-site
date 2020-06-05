<?php

namespace App;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'first_name', 'last_name', 'birthday', 'gender', 'country', 'bio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function scopeWithSettings($query)
    {
        $minAge = Carbon::today()->subYears(setting()->get('from_age'))->toDateString();
        $maxAge = Carbon::today()->subYears(setting()->get('to_age') + 1)->addDay()->toDateString();
        return $query->whereBetween('birthday', [$maxAge, $minAge])
            ->whereIn('gender', setting()->get('gender'));
    }

    public function scopeWithoutSeen($query, User $user)
    {
        $seen = $user->likes()->pluck('judged_id')->toArray();
        return $query->whereNotIn('user_id', $seen);
    }
}
