<?php

namespace App\Features;

use App\Domains\Post\Jobs\DeletePostJob;
use App\Domains\Post\Requests\DeletePostRequest;
use App\Models\Post;
use Lucid\Units\Feature;

class DeletePostFeature extends Feature
{
    /**
     * @var Post
     */
    private Post $post;

    /**
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @param DeletePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(DeletePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->run(DeletePostJob::class, [
            'post' => $this->post
        ]);

        return redirect()->route('posts.create')
            ->with(__('messages.post.delete.success'));
    }
}
