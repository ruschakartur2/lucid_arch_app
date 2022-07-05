<?php

namespace App\Features;

use App\Domains\Post\Jobs\GetPostListJob;
use App\Domains\Post\Requests\GetPostListRequest;
use App\Enums\PostSortFieldEnum;
use App\Enums\PostSortOrderEnum;
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

        /** @var array $sortingPost */
        $sortFieldPost = PostSortFieldEnum::asArray();

        /** @var array $sortKeyPost */
        $sortOrderPost = PostSortOrderEnum::asArray();

        /** @var Post $posts */
        $posts = $this->run(
            new GetPostListJob(
                [auth()->user()->id],
                Arr::get($data, 'status'),
                Arr::get($data, 'isToday'),
                Arr::get($data, 'sortField'),
                Arr::get($data, 'sortOrder'),
            ),
        );

        return view('posts.index', [
            'posts'           => $posts,
            'status_list'     => $statusPost,
            'sort_field_list' => $sortFieldPost,
            'sort_order_list'   => $sortOrderPost,
        ]);
    }
}
