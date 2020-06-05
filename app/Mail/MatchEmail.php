<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MatchEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private User $user;
    private User $match;

    public function __construct(User $user, User $match)
    {
        $this->user = $user;
        $this->match = $match;
    }

    public function build()
    {
        return $this->view('emails.match', [
            'user' => $this->user->profile,
            'match' => $this->match->profile
        ]);
    }
}
