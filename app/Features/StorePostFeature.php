<?php

namespace App\Features;

use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Post\Jobs\SavePostJob;
use App\Domains\Post\Requests\StorePost;
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

        $this->run(SavePostJob::class, [
            'data' => $data,
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => __('messages.post.create.success'),
        ]);
    }
}
