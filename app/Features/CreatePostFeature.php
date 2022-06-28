<?php

namespace App\Features;

use Illuminate\Http\Request;
use Lucid\Units\Feature;

class CreatePostFeature extends Feature
{
    public function handle(Request $request)
    {
        return view('posts.create');
    }
}
