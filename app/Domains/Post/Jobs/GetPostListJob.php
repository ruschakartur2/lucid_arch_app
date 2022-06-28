<?php

namespace App\Domains\Post\Jobs;

use App\Repository\PostRepository;
use Lucid\Units\Job;

class GetPostListJob extends Job
{
    /**
     * @var array
     */
    private $relation;

    /**
     * @param array $relation
     */
    public function __construct(array $relation)
    {
        $this->relation = $relation;
    }

    /**
     * @param PostRepository $postRepository
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function handle(PostRepository $postRepository)
    {
        return $postRepository->getPostList($this->relation);
    }
}
