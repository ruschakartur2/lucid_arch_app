<?php

namespace App\Features;

use App\Domains\Post\Jobs\GetPostListJob;
use App\Domains\Post\Requests\GetPostListRequest;
use App\Enums\PostStatusEnum;
use App\Models\Post;
use Illuminate\Support\Arr;
use Lucid\Units\Feature;

class UserPostIndexFeature extends Feature
{
    /**
     * @param GetPostListRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle(GetPostListRequest $request)
    {
        /** @var array $data */
        $data = $request->validated();

        /** @var array $statusPost */
        $statusPost = PostStatusEnum::asArray();

        /** @var Post $posts */
        $posts = $this->run(
            new GetPostListJob(
                [auth()->user()->id],
                Arr::get($data, 'status'),
                Arr::get($data, 'isToday'),
            ),
        );

        return view('home', [
            'posts'       => $posts,
            'status_list' => $statusPost,
        ]);
    }
}
