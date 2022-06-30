<?php

namespace App\Repository;

use App\Models\Comment;

class CommentRepository extends Repository
{
    /**
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
    }

    /**
     * @param array $relation
     * @param int|null $userId
     * @return mixed
     */
    public function getCommentList(array $relation, ?int $userId)
    {
        $query = $this->model
            ->with($relation);

        $query = $this->commentFilter($query, $userId);

        return $query->get();
    }

    /**
     * @param $query
     * @param int|null $userId
     * @return mixed
     */
    private function commentFilter($query, ?int $userId)
    {
        if ($userId) {
            $query->whereUserId($userId);
        }

        return $query;
    }
}
