<?php

namespace App\Features;

use App\Domains\Post\Jobs\GetPostListJob;
use App\Domains\Post\Requests\GetPostListRequest;
use App\Domains\User\Jobs\GetUserListJob;
use App\Enums\PostSortFieldEnum;
use App\Enums\PostSortOrderEnum;
use App\Enums\PostStatusEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Lucid\Units\Feature;

class IndexPostFeature extends Feature
{


    public function handle(GetPostListRequest $request)
    {
        $data = $request->validated();

        /** @var array $statusPost */
        $statusPost = PostStatusEnum::asArray();

        /** @var array $sortingPost */
        $sortFieldPost = PostSortFieldEnum::asArray();

        /** @var array $sortKeyPost */
        $sortOrderPost = PostSortOrderEnum::asArray();

        /** @var Collection $userList */
        $userList = $this->run(new GetUserListJob([]));

        /** @var Collection $posts */
        $posts = $this->run(
            new GetPostListJob(
                Arr::get($data, 'userId'),
                Arr::get($data, 'status'),
                Arr::get($data, 'isToday'),
                Arr::get($data, 'sortField'),
                Arr::get($data, 'sortOrder'),
            )
        );

        return view('home', [
            'posts'           => $posts,
            'status_list'     => $statusPost,
            'user_list'       => $userList,
            'sort_field_list' => $sortFieldPost,
            'sort_order_list'   => $sortOrderPost,
        ]);
    }
}
