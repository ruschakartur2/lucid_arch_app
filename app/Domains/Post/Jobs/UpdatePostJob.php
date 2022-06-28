<?php

namespace App\Domains\Post\Jobs;

use App\Data\Models\Post;
use App\Domains\Post\Requests\StorePost;
use Carbon\Carbon;
use Lucid\Units\Job;

class UpdatePostJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $title,
        $description,
        $post
    )
    {
        $this->description = $description;
        $this->title = $title;
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $attributes = [
            'title' => $this->title,
            'description' => $this->description,
        ];
        return $this->post->update($attributes);
    }
}
