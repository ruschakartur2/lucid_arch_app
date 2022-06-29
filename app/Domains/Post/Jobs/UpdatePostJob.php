<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Lucid\Units\Job;

class UpdatePostJob extends Job
{
    /**
     * @var array
     */
    private array $data;

    /**
     * @var Post
     */
    private Post $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data, Post $post)
    {
        $this->data = $data;
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        return $this->post->update($this->data);
    }
}
