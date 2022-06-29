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
    public function getPostList(array $relation)
    {
        return $this->model
            ->with($relation)
            ->get();
    }

    /**
     * @param int $user_id
     * @param array $relation
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getUserPostList(int $user_id, array $relation)
    {
        return $this->model
            ->with($relation)
            ->where('user_id', $user_id)
            ->latest()
            ->get();
    }
}
