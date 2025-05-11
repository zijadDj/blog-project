<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showSignupForm(){
        return view('signup');
    }

    public function signup(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'about' => 'nullable|string|max:500',
        ]);

        $picturePath = null;

        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('pictures', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $picturePath,
            'about' => $request->about,
            'admin' => 0, // Default to non-admin
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Signup successful!');
    }

    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'Your email or password is not correct'])->withInput();
    }


    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'You are now logged out');
    }
}
