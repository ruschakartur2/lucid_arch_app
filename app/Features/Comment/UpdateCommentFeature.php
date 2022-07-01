<?php

namespace App\Features\Comment;

use App\Domains\Comment\Jobs\UpdateCommentJob;
use App\Domains\Comment\Requests\UpdateCommentRequest;
use App\Domains\Http\Jobs\RedirectBackJob;
use App\Models\Comment;
use App\Models\Post;
use Lucid\Units\Feature;

class UpdateCommentFeature extends Feature
{
    /**
     * @var Post
     */
    private Post $post;

    /**
     * @var Comment
     */
    private Comment $comment;

    /**
     * @param Post $post
     * @param Comment $comment
     */
    public function __construct(Post $post, Comment $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * @param UpdateCommentRequest $request
     * @return mixed
     */
    public function handle(UpdateCommentRequest $request)
    {
        $data = $request->validated();

        $this->run(UpdateCommentJob::class, [
            'data'    => $data,
            'comment' => $this->comment,
            'post'    => $this->post
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => __('messages.comment.update.success')
        ]);
    }
}
