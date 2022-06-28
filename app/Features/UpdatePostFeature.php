<?php

namespace App\Features;

use App\Data\Models\Post;
use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Post\Jobs\UpdatePostJob;
use App\Domains\Post\Requests\StorePost;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class UpdatePostFeature extends Feature
{
    public $post;

    public function __construct(
        Post $post
    )
    {
        $this->post = $post;
    }

    public function handle(StorePost $request)
    {
        $this->run(UpdatePostJob::class, [
            'post' => $this->post,
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        return $this->run(RedirectBackJob::class, [
            'withMessage' => 'Post updated successfully.'
        ]);
    }
}
