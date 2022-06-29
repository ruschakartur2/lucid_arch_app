<?php

namespace App\Features;

use App\Domains\Post\Jobs\GetPostListJob;
use Lucid\Units\Feature;

class UserPostIndexFeature extends Feature
{
    public function handle()
    {
        $posts = $this->run(new GetPostListJob([], auth()->user()->id));

        return view('posts.index', compact('posts'));
    }
}
