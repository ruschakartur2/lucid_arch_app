<?php

namespace App\Features;

use App\Domains\Post\Jobs\GetPostListJob;
use Illuminate\Support\Collection;
use Lucid\Units\Feature;

class IndexPostFeature extends Feature
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle()
    {
        /** @var Collection $posts */
        $posts = $this->run(new GetPostListJob([]));

        return view('home', compact('posts'));
    }
}
