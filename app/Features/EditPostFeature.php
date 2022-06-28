<?php

namespace App\Features;

use App\Data\Models\Post;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class EditPostFeature extends Feature
{
    public $post;

    public function __construct(
        Post $post
    ){
        $this->post = $post;
    }

    public function handle(Request $request)
    {
        return view('posts.edit')->with('post', $this->post);
    }
}
