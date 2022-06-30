<?php

namespace App\Domains\Comment\Jobs;

use App\Repository\CommentRepository;
use Lucid\Units\Job;

class GetCommentListJob extends Job
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
     * @param CommentRepository $commentRepository
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function handle(CommentRepository $commentRepository)
    {
        return $commentRepository->getCommentList(
            $this->relation,
            $this->userId
        );
    }
}
