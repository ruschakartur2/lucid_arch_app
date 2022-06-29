<?php

namespace App\Features;

use App\Domains\Post\Jobs\GetPostListJob;
use App\Models\Post;
use Lucid\Units\Feature;

class UserPostIndexFeature extends Feature
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle()
    {
        /** @var Post $posts */
        $posts = $this->run(new GetPostListJob([], auth()->user()->id));

        return view('posts.index', compact('posts'));
    }
}
