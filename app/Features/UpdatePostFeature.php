<?php

namespace App\Features;

use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Post\Jobs\UpdatePostJob;
use App\Domains\Post\Jobs\UploadPostImageJob;
use App\Domains\Post\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Arr;
use Lucid\Units\Feature;

class UpdatePostFeature extends Feature
{
    /**
     * @var Post
     */
    private Post $post;

    /**
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @param UpdatePostRequest $request
     * @return mixed
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function handle(UpdatePostRequest $request)
    {
        $data = $request->validated();
        $this->run(UpdatePostJob::class, [
            'data' => Arr::except($data, 'img'),
            'post' => $this->post
        ]);

        $this->run(UploadPostImageJob::class, [
            'image' => $request->file('img'),
            'post' => $this->post
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => __('messages.post.update.success')
        ]);
    }
}
