<?php

namespace App\Features\Comment;

use App\Domains\Comment\Jobs\DeleteCommentJob;
use App\Domains\Http\Jobs\RedirectBackJob;
use App\Models\Comment;
use App\Models\Post;
use Lucid\Units\Feature;

class DeleteCommentFeature extends Feature
{
    /**
     * @var Comment
     */
    private Comment $comment;

    /**
     * @var Post
     */
    private Post $post;

    /**
     * @param Post $post
     * @param Comment $comment
     */
    public function __construct(Post $post, Comment $comment)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(): \Illuminate\Http\RedirectResponse
    {
        $this->run(DeleteCommentJob::class, [
            'post'    => $this->post,
            'comment' => $this->comment
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => __('messages.comment.delete.success'),
        ]);
    }
}
