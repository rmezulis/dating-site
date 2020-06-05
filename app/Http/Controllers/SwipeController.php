<?php

namespace App\Http\Controllers;

use App\Events\MatchEvent;
use App\Like;
use App\Mail\MatchEmail;
use App\Match;
use App\Profile;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SwipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = auth()->user()->profile
            ->withoutSeen(auth()->user())
            ->withSettings()
            ->inRandomOrder()
            ->first();
        $pictures = $profile ? $profile->user->pictures : null;
        return view('matching', [
            'profile' => $profile,
            'pictures' => $pictures
        ]);
    }

    public function matches()
    {
        $user = auth()->user();
        $matches = $user->matchedWith ? $user->matchedWith->merge($user->matchedBy) : null;
        return view('matches', [
            'matches' => $matches
        ]);
    }

    public function match(User $user)
    {
        return view('match', [
            'profile' => $user->profile,
            'pictures' => $user->pictures
        ]);
    }

    public function like(User $user)
    {

        /** @var User $currentUser */
        $currentUser = auth()->user();
        $currentUser->likes()->attach($user->id, ['like' => true]);
        if (Like::match($user)->exists()) {
            event(new MatchEvent($currentUser, $user));
            $currentUser->matchedWith()->attach($user->id);
            return redirect()->route('swipe.show')->with('new-match', "It's a match!");
        }
        return redirect()->route('swipe.show');
    }

    public function pass(User $user)
    {
        auth()->user()->likes()->attach($user->id, ['like' => false]);
        return redirect()->route('swipe.show');
    }
}
