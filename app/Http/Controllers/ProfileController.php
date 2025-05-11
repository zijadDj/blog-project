<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(){
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . $user->id,
            'about' => 'nullable|string',
            'picture' => 'nullable|image',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->about = $request->input('about');

        if ($request->hasFile('picture')) {
            // Delete old picture if exists
            if ($user->picture && Storage::exists('public/' . $user->picture)) {
                Storage::delete('public/' . $user->picture);
            }
            // Store new picture
            $user->picture = $request->file('picture')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Your profile has been updated.');
    }
}
