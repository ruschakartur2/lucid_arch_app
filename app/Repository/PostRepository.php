<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

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
     * @param bool|null $isToday
     * @param string|null $sortField
     * @return mixed
     */
    public function getPostList(
        array   $relation,
        ?array  $userId,
        ?array  $status,
        ?bool   $isToday,
        ?string $sortField
    )
    {
        $query = $this->model
            ->with($relation);

        $query = $this->postSelect($query);

        $query = $this->postFilter(
            $query,
            $userId,
            $status,
            $isToday
        );

        $query = $this->postSorting(
            $query,
            $sortField,
        );

        return $query->get();
    }

    /**
     * @param $query
     * @return mixed
     */
    private function postSelect($query)
    {
        $query->select('id', 'title', 'slug', 'status', 'created_at', 'updated_at',
            DB::raw('
                       (CASE
                             WHEN status = "draft" THEN 3
                             WHEN status = "active" THEN 2
                             WHEN status = "close" THEN 1
                       END) as status_sort
                     ')
        );

        return $query;
    }

    /**
     * @param $query
     * @param array|null $userId
     * @param array|null $status
     * @param bool|null $isToday
     * @return mixed
     */
    private function postFilter(
        $query,
        ?array $userId,
        ?array $status,
        ?bool $isToday
    )
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

    /**
     * @param $query
     * @param string|null $byDate
     * @param string|null $byStatus
     * @return mixed
     */
    private function postSorting(
        $query,
        ?string $sortField
    )
    {
        if ($sortField) {
            $query->orderBy($sortField, 'desc');
        }

        return $query;
    }
}
