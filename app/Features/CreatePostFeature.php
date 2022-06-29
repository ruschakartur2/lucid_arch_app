<?php

namespace App\Features;

use App\Enums\PostStatusEnum;
use Lucid\Units\Feature;

class CreatePostFeature extends Feature
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle()
    {
        return view('posts.create')
            ->with('status_list', PostStatusEnum::getValues());
    }
}
