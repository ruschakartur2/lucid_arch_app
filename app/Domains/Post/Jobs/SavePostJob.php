<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Lucid\Units\Job;

class SavePostJob extends Job
{
    /**
     * @var array
     */
    private array $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $post = new Post($this->data);
        $user = auth()->user();

        return $user->posts()->save($post);
    }
}
