<?php

namespace App\Features\Comment;

use App\Domains\Comment\Jobs\SaveCommentJob;
use App\Domains\Comment\Requests\StoreCommentRequest;
use App\Domains\Http\Jobs\RedirectBackJob;
use App\Models\Comment;
use App\Models\Post;
use Lucid\Units\Feature;

class StoreCommentFeature extends Feature
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
     * @param StoreCommentRequest $request
     * @return void
     */
    public function handle(StoreCommentRequest $request)
    {
        /** @var array $data */
        $data = $request->validated();

        /** @var Comment $comment */
        $this->run(SaveCommentJob::class, [
            'data' => $data,
            'post' => $this->post
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => __('messages.comment.create.success'),
        ]);
    }
}
