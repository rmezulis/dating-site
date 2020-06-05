<?php

namespace App\Events;

use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MatchEvent
{
    use Dispatchable, SerializesModels;

    private User $currentUser;
    private User $user;

    public function __construct(User $currentUser, User $user)
    {
        $this->currentUser = $currentUser;
        $this->user = $user;
    }

    public function currentUser(): User
    {
        return $this->currentUser;
    }

    public function user(): User
    {
        return $this->user;
    }
}
