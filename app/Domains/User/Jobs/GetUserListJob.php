<?php

namespace App\Domains\User\Jobs;

use App\Repository\UserRepository;
use Lucid\Units\Job;

class GetUserListJob extends Job
{
    /**
     * @param UserRepository $userRepository
     * @return mixed
     */
    public function handle(UserRepository $userRepository)
    {
        return $userRepository->getUserList([]);
    }
}
