<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Like;
use App\Picture;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $profile = auth()->user()->profile;
        $pictures = auth()->user()->pictures;
        return view('my-profile', [
            'profile' => $profile,
            'pictures' => $pictures
        ]);
    }

    public function edit()
    {
        $user = auth()->user();
        return view('edit-profile', [
            'profile' => $user->profile
        ]);
    }

    public function create()
    {
        return view('new-profile');
    }

    public function store(StoreProfileRequest $request)
    {        dd($request);

        $profile = new Profile($request->all());
        $picture = new Picture(['location' => $request->file('picture')->store('pictures')]);
        auth()->user()->profile()->save($profile);
        auth()->user()->pictures()->save($picture);
        return redirect()->route('swipe.show');
    }

    public function update(StoreProfileRequest $request)
    {

        auth()->user()->profile->update($request->all());
        if ($request->file('pictures')) {
            Like::where('judged_id', auth()->id())->where('like', false)->delete();
            $pictures = [];
            foreach ($request->file('pictures') as $file) {
                $pictures[] = new Picture([
                    'location' => $file->store('pictures')
                ]);
            }
            auth()->user()->pictures()->saveMany($pictures);
        }
        return redirect()->route('profile.index')
            ->with('status', 'Profile updated');
    }
}
