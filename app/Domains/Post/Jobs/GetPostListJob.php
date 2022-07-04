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
    private ?string $byDate;

    /**
     * @var string|null
     */
    private ?string $byStatus;

    /**
     * @param array|null $userId
     * @param array|null $status
     * @param bool|null $isToday
     * @param string|null $byDate
     * @param string|null $byStatus
     * @param array|null $relation
     */
    public function __construct(
        ?array $userId,
        ?array $status,
        ?bool $isToday,
        ?string $byDate,
        ?string $byStatus,
        ?array $relation = []
    )
    {
        $this->relation = $relation;
        $this->userId = $userId;
        $this->status = $status;
        $this->isToday = $isToday;
        $this->byDate = $byDate;
        $this->byStatus = $byStatus;
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
            $this->byDate,
            $this->byStatus,
    );
    }
}
