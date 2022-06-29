<?php

namespace App\Domains\Post\Jobs;

use App\Repository\PostRepository;
use Lucid\Units\Job;

class GetPostListJob extends Job
{
    /**
     * @var array
     */
    private array $relation;

    /**
     * @var int|null
     */
    private ?int $userId;

    /**
     * @param array $relation
     * @param int|null $userId
     */
    public function __construct(array $relation, ?int $userId)
    {
        $this->relation = $relation;
        $this->userId = $userId;
    }

    /**
     * @param PostRepository $postRepository
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function handle(PostRepository $postRepository)
    {
        return $postRepository->getPostList(
            $this->relation,
            $this->userId
        );
    }
}
