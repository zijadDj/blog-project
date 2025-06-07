<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(SignupRequest $request)
    {
        $request->validated();

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

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'Your email or password is not correct'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/')->with('success', 'You are now logged out');
    }
}
