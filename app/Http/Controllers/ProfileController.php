<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('profile.show', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $this->authorize('update', $user);

        $request->validated();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->about = $request->input('about');

        if ($request->hasFile('picture')) {
            // Delete old picture if exists
            if ($user->picture && Storage::exists('public/'.$user->picture)) {
                Storage::delete('public/'.$user->picture);
            }
            // Store new picture
            $user->picture = $request->file('picture')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect('/')->with('success', 'Profile updated successfully!');

    }
}
