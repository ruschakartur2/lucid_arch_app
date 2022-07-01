<?php

namespace App\Domains\Comment\Jobs;

use App\Models\Comment;
use App\Models\Post;
use Lucid\Units\Job;

class UpdateCommentJob extends Job
{
    /**
     * @var array
     */
    private array $data;

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
     * @param array $data
     * @param Comment $comment
     * @param Post $post
     */
    public function __construct(array $data, Comment $comment, Post $post)
    {
        $this->data = $data;
        $this->comment = $comment;
        $this->post = $post;
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
            ->where('id', '=', $this->comment->id)
            ->update($this->data);
    }
}
