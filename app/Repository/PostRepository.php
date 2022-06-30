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
     * @param int|null $userId
     * @return mixed
     */
    public function getPostList(array $relation, ?int $userId)
    {
        $query = $this->model
            ->with($relation);

        $query = $this->postFilter($query, $userId);

        return $query->get();
    }

    /**
     * @param $query
     * @param int|null $userId
     * @return mixed
     */
    private function postFilter($query, ?int $userId)
    {
        if ($userId) {
            $query->whereUserId($userId);
        }

        return $query;
    }
}
