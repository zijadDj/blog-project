<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(4);

        return view('welcome', compact('posts'));
    }
}
