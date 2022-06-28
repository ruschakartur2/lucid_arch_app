<?php

namespace App\Repository;

use App\Models\Post;

class PostRepository extends Repository
{
    /**
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    /**
     * @param array $relation
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getPostList(array $relation) {
        return $this->model
            ->with($relation)
            ->get();
    }
}
