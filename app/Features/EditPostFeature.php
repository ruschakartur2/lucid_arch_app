<?php

namespace App\Features;

use App\Enums\PostStatusEnum;
use App\Models\Post;
use Lucid\Units\Feature;

class EditPostFeature extends Feature
{
    /**
     * @var Post
     */
    public Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle()
    {
        /** @var array $statusPost */
        $statusPost = PostStatusEnum::asArray();

        return view('posts.edit', [
            'post' => $this->post,
            'status_list' => $statusPost
        ]);
    }
}
