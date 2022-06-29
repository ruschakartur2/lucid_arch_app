<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;
use phpDocumentor\Reflection\Types\String_;

class SavePostJob extends Job
{
    /**
     * @var String_
     */
    public $title;
    /**
     * @var String_
     */
    public $description;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title, $description)
    {
        $this->description = $description;
        $this->title = $title;
    }

    /**
     * @return mixed
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
