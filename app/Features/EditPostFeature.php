<?php

namespace App\Features;

use App\Models\Post;
use Lucid\Units\Feature;

class EditPostFeature extends Feature
{
    /**
     * @var Post
     */
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle()
    {
        return view('posts.edit')->with('post', $this->post);
    }
}
