<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $request->validated();

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
