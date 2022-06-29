<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Lucid\Units\Job;

class DeletePostJob extends Job
{

    /**
     * @var Post
     */
    private $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        return $this->post->delete();
    }
}
