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
     * @param array|null $userId
     * @param array|null $status
     * @param bool $isToday
     * @return mixed
     */
    public function getPostList(array $relation, ?array $userId, ?array $status, ?bool $isToday)
    {
        $query = $this->model
            ->with($relation);

        $query = $this->postFilter($query, $userId, $status, $isToday);

        return $query->get();
    }

    /**
     * @param $query
     * @param array|null $userId
     * @param array|null $status
     * @param bool|null $isToday
     * @return mixed
     */
    private function postFilter($query, ?array $userId, ?array $status, ?bool $isToday)
    {
        if ($userId) {
            $query->whereIn('user_id', $userId);
        }
        if ($status) {
            $query->whereIn('status', $status);
        }
        if ($isToday) {
            $query->whereDay('created_at', '=', now()->day);
        }

        return $query;
    }
}
