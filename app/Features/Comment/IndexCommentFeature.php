<?php

namespace App\Features\Comment;

use App\Domains\Comment\Jobs\GetCommentListJob;
use Illuminate\Support\Collection;
use Lucid\Units\Feature;

class IndexCommentFeature extends Feature
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle()
    {
        /** @var Collection $comments */
        $comments = $this->run(new GetCommentListJob(['post'], null));

        return view('comments', [
            'comments' => $comments,
        ]);
    }
}
