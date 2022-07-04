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
     * @param string|null $byDate
     * @param string|null $byStatus
     * @return mixed
     */
    public function getPostList(
        array   $relation,
        ?array  $userId,
        ?array  $status,
        ?bool   $isToday,
        ?string $byDate,
        ?string $byStatus
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
            $byDate,
            $byStatus
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
                             WHEN status = "draft" THEN 1
                             WHEN status = "active" THEN 2
                             WHEN status = "close" THEN 3
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
        ?string $byDate,
        ?string $byStatus
    )
    {
        if ($byStatus) {
            $query->orderBy('status_sort', $byStatus);
        }
        if ($byDate) {
            $query->orderBy('created_at', $byDate);
        }

        return $query;
    }
}
