<?php

namespace App\Domains\Post\Jobs;

use App\Data\Models\Post;
use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class SavePostJob extends Job
{
    public $title;
    public $description;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $title,
        $description
    )
    {
        $this->description = $description;
        $this->title = $title;
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

        $post = new Post($attributes);
        $user = Auth::user();

        return $user->posts()->save($post);
    }
}
