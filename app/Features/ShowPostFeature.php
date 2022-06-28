<?php

namespace App\Features;

use Illuminate\Http\Request;
use Lucid\Units\Feature;
use App\Data\Models\Post;

class ShowPostFeature extends Feature
{
    public $post;

    public function __construct(
        Post $post
    ){
        $this->post = $post;
    }

    public function handle(Request $request)
    {
        return view('posts.show')->with('post', $this->post);
    }
}
