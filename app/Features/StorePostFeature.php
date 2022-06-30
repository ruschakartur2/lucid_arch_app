<?php

namespace App\Features;

use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Post\Jobs\SavePostJob;
use App\Domains\Post\Jobs\UploadPostImageJob;
use App\Domains\Post\Requests\StorePost;
use App\Models\Post;
use Illuminate\Support\Arr;
use Lucid\Units\Feature;

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

        $this->run(UploadPostImageJob::class, [
            'image' => $request->file('img'),
            'post' => $post

        ]);

        if($request->hasFile('img') && $request->file('img')->isValid()) {
            $post->addMediaFromRequest('img')->toMediaCollection('img');
        }

        return $this->run(RedirectBackJob::class, [
            'withMessage' => __('messages.post.create.success'),
        ]);
    }
}
