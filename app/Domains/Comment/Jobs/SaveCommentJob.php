<?php

namespace App\Domains\Comment\Jobs;

use App\Models\Comment;
use App\Models\Post;
use Lucid\Units\Job;

class SaveCommentJob extends Job
{
    /**
     * @var array
     */
    private array $data;

    /**
     * @var Post $post
     */
    private Post $post;

    /**
     * Create a new job instance.
     *
     * @param array $data
     * @param Post $post
     */
    public function __construct(array $data, Post $post)
    {
        $this->data = $data;
        $this->post = $post;
    }

    /**
     * @return false|\Illuminate\Database\Eloquent\Model
     */
    public function handle()
    {
        /** @var Comment $comment */
        $comment = new Comment($this->data);
        return $this->post->comments()->save($comment);
    }
}
