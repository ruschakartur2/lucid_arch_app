<?php

namespace App\Features;

use App\Models\Post;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class ShowPostFeature extends Feature
{
    public $post;

    public function __construct(
        Post $post
    ){
        $this->post = $post;
    }

    public function handle()
    {
        return view('posts.show')->with('post', $this->post);
    }
}
