<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $picturePath = null;
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'picture' => $picturePath ?? null,
            'user_id' => Auth::id(),
            'published_at' => now(),
        ]);

        return redirect('/')->with('success', 'Post created');
    }
}
