<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * @param Post $post
     * @return void
     */
    public function saving(Post $post)
    {
        $post->slug = $this->generateSlug($post);
    }

    /**
     * @param Post $post
     * @return void
     */
    public function updating(Post $post)
    {
        $post->slug = $this->generateSlug($post);
    }

    /**
     * @param Post $post
     * @return string
     */
    private function generateSlug(Post $post): string
    {
        return Str::slug($post->title, '_');
    }
}
