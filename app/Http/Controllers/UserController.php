<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        if(!auth()->user()->admin){
            abort(403, 'Unauthorized action.');
        }

        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function destroy(User $user){
        if(!auth()->user()->admin){
            abort(403, 'Unauthorized action.');
        }

        if(auth()->id() === $user->id){
            return redirect()->route('users.index')->withErrors(['You cannot delete yourself.']);
        }

        $admin = auth()->user();

        Post::where('user_id', $user->id)
            ->update(['user_id' => $admin->id]);


        $user->delete();

        return redirect()->route('users.index')->withErrors(['User deleted.']);
    }
}
