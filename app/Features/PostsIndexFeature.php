<?php

namespace App\Features;

use App\Data\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lucid\Units\Feature;

class PostsIndexFeature extends Feature
{
    public function handle(Request $request)
    {
        $posts = Post::where('user_id', Auth::user()->id)->latest()->get();

        return view('posts.index', compact('posts'));
    }
}
