<?php

namespace App\Features;

use App\Data\Models\Post;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class DeletePostFeature extends Feature
{
    public $post;

    public function __construct(Post $post){
        $this->post = $post;
    }

    public function handle()
    {
        $this->post->delete();

        return redirect()->route('posts.create')
            ->with('success', 'Post deleted!!!');
    }
}
