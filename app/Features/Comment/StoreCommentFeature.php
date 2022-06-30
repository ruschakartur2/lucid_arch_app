<?php

namespace App\Features\Comment;

use App\Domains\Comment\Requests\StoreComment;
use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Post\Jobs\SavePostJob;
use App\Domains\Post\Jobs\UploadPostImageJob;
use App\Domains\Post\Requests\StorePost;
use App\Models\Post;
use Illuminate\Support\Arr;
use Lucid\Units\Feature;

class StoreCommentFeature extends Feature
{
    /**
     * @param StoreComment $request
     * @return mixed
     */
    public function handle(StoreComment $request)
    {
        $data = $request->validated();

        /** @var Post $post */
        $post = $this->run(SavePostJob::class, [
            'data' => Arr::except($data, 'img'),
        ]);

        $this->run(UploadPostImageJob::class, [
            'image' => $request->file('img'),
            'post' => $post
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => __('messages.post.create.success'),
        ]);
    }
}
