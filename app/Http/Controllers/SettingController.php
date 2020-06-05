<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use Grimthorr\LaravelUserSettings\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('settings');
    }

    public function update(SettingRequest $request)
    {
        setting()->set('from_age', $request->get('from_age'));
        setting()->set('to_age', $request->get('to_age'));
        setting()->set('gender', $request->get('gender'));
        setting()->save();
        return redirect()->route('swipe.show')
            ->with('status', 'Settings updated');
    }
}
