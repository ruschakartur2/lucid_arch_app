<?php

namespace App\Features;

use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Post\Jobs\SavePostJob;
use App\Domains\Post\Requests\StorePost;
use Lucid\Units\Feature;

class StorePostFeature extends Feature
{
    public function handle(StorePost $request)
    {
        $this->run(SavePostJob::class, [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => 'Post created successfully.',
        ]);
    }
}
