<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('edit-pictures', [
            'pictures' => auth()->user()->pictures
        ]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $file) {
                $picture = new Picture([
                    'location' => $file->store('pictures')
                ]);
                auth()->user()->pictures()->save($picture);
            }
        }
        return redirect()->route('profile.show');
    }

    public function delete(Picture $picture)
    {
        Storage::delete($picture->location);
        $picture->delete();
        return redirect()->back();
    }
}
