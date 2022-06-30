<?php

namespace App\Features\Comment;

use App\Domains\Comment\Jobs\GetCommentListJob;
use App\Domains\Comment\Requests\StoreComment;
use Illuminate\Support\Collection;
use Lucid\Units\Feature;

class IndexCommentFeature extends Feature
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle(StoreComment $request)
    {
        /** @var Collection $comments */
        $comments = $this->run(new GetCommentListJob([], null));

        return view('home', compact('comments'));
    }
}
