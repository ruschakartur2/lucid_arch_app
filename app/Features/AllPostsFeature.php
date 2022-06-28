<?php

namespace App\Features;

use App\Data\Models\Post;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class AllPostsFeature extends Feature
{
    public function handle()
    {
        $posts = Post::latest()->get();

        return view('home', compact('posts'));
    }
}
