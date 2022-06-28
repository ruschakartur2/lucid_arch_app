<?php

namespace App\Features;

use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Post\Jobs\UpdatePostJob;
use App\Domains\Post\Requests\StorePost;
use App\Models\Post;
use Illuminate\Support\Collection;
use Lucid\Units\Feature;

class UpdatePostFeature extends Feature
{
    /**
     * @var Post
     */
    private $post;

    /**
     * @param Post $post
     */
    public function __construct(
        Post $post
    )
    {
        $this->post = $post;
    }

    /**
     * @param StorePost $request
     * @return mixed
     */
    public function handle(StorePost $request)
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
