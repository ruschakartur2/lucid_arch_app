<?php

namespace App\Features;

use App\Models\Post;
use Lucid\Units\Feature;

class DeletePostFeature extends Feature
{
    private $post;

    /**
     * @param Post $post
     */
    public function __construct(Post $post){
        $this->post = $post;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle()
    {
        $this->post->delete();

        return redirect()->route('posts.create')
            ->with(__('messages.post.delete.success'));
    }
}
