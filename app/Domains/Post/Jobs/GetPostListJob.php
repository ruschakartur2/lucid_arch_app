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
     * @var array|null
     */
    private ?array $userId;

    /**
     * @var array|null
     */
    private ?array $status;

    /**
     * @var bool|null
     */
    private ?bool $isToday;

    /**
     * @var string|null
     */
    private ?string $sortField;

    /**
     * @param array|null $userId
     * @param array|null $status
     * @param bool|null $isToday
     * @param string|null $sortField
     * @param array|null $relation
     */
    public function __construct(
        ?array $userId,
        ?array $status,
        ?bool $isToday,
        ?string $sortField,
        ?array $relation = []
    )
    {
        $this->relation = $relation;
        $this->userId = $userId;
        $this->status = $status;
        $this->isToday = $isToday;
        $this->sortField = $sortField;
    }

    /**
     * @param PostRepository $postRepository
     * @return mixed
     */
    public function handle(PostRepository $postRepository)
    {
        return $postRepository->getPostList(
            $this->relation,
            $this->userId,
            $this->status,
            $this->isToday,
            $this->sortField
    );
    }
}
