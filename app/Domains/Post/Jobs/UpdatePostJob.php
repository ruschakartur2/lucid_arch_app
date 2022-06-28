<?php

namespace App\Domains\Post\Jobs;

use Lucid\Units\Job;

class UpdatePostJob extends Job
{
    private $data;
    private $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $data,
        $post
    )
    {
        $this->data = $data;
        $this->post = $post;
    }


    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        return $this->post->update($this->data);
    }
}
