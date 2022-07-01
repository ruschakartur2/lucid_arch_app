<?php

namespace App\Domains\Comment\Jobs;

use App\Models\Comment;
use App\Models\Post;
use Lucid\Units\Job;

class DeleteCommentJob extends Job
{
    /**
     * @var Comment $comment
     */
    private Comment $comment;

    /**
     * @var Post
     */
    private Post $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post, Comment $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        return $this->post
            ->comments()
            ->where('id','=',$this->comment->id)
            ->delete();
    }
}
