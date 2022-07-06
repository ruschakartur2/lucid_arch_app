<?php

namespace App\Features;

use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Post\Jobs\SavePostJob;
use App\Domains\Post\Jobs\SendPostMailMessageJob;
use App\Domains\Post\Jobs\UploadPostImageJob;
use App\Domains\Post\Requests\StorePost;
use App\Domains\User\Jobs\GetUserListJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Lucid\Units\Feature;
use Ramsey\Collection\Collection;

class StorePostFeature extends Feature
{
    /**
     * @param StorePost $request
     * @return mixed
     */
    public function handle(StorePost $request)
    {
        $data = $request->validated();

        /** @var Post $post */
        $post = $this->run(SavePostJob::class, [
            'data' => Arr::except($data, 'img'),
        ]);

        /** @var Collection $users */
        $users = $this->run(GetUserListJob::class);

        $this->run(UploadPostImageJob::class, [
            'image' => $request->file('img'),
            'post'  => $post
        ]);
        $this->run(SendPostMailMessageJob::class, [
            'post'   => $post,
            'emails' => $users->pluck('email')->toArray(),
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => __('messages.post.create.success'),
        ]);
    }
}
