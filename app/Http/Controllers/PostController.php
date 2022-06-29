<?php

namespace App\Http\Controllers;

use App\Features\CreatePostFeature;
use App\Features\DeletePostFeature;
use App\Features\EditPostFeature;
use App\Features\IndexPostFeature;
use App\Features\ShowPostFeature;
use App\Features\StorePostFeature;
use App\Features\UpdatePostFeature;
use App\Models\Post;
use Lucid\Units\Controller;

class PostController extends Controller
{
    /**
     * @return mixed
     */
    public function create()
    {
        return $this->serve(CreatePostFeature::class);
    }

    /**
     * @return mixed
     */
    public function store()
    {
        return $this->serve(StorePostFeature::class);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->serve(IndexPostFeature::class);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function show(Post $post)
    {
        return $this->serve(ShowPostFeature::class, [
            'post' => $post,
        ]);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function edit(Post $post)
    {
        return $this->serve(EditPostFeature::class, [
            'post' => $post
        ]);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function update(Post $post)
    {
        return $this->serve(UpdatePostFeature::class, [
            'post' => $post,
        ]);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function destroy(Post $post)
    {
        return $this->serve(DeletePostFeature::class, [
            'post' => $post,
        ]);
    }
}
