<?php

namespace App\Listeners;

use App\Events\MatchEvent;
use App\Mail\MatchEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMatchEmail implements ShouldQueue
{
    public function handle(MatchEvent $event)
    {
        Mail::to($event->currentUser()->email)
            ->queue(new MatchEmail($event->currentUser(), $event->user()));

        Mail::to($event->user()->email)
            ->queue(new MatchEmail($event->user(), $event->currentUser()));
    }
}
