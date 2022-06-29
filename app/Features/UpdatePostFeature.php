<?php

namespace App\Features;

use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Post\Jobs\UpdatePostJob;
use App\Domains\Post\Requests\UpdatePost;
use App\Models\Post;
use Illuminate\Support\Collection;
use Lucid\Units\Feature;

class UpdatePostFeature extends Feature
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
     * @param UpdatePost $request
     * @return mixed
     */
    public function handle(UpdatePost $request)
    {
        $data = $request->validated();

        /** @var Collection $data */
        $this->run(UpdatePostJob::class, [
            'data' => $data,
            'post' => $this->post
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => __('messages.post.update.success')
        ]);
    }
}
