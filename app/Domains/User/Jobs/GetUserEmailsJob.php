<?php

namespace App\Domains\User\Jobs;

use App\Repository\UserRepository;
use Illuminate\Support\Collection;
use Lucid\Units\Job;

class GetUserEmailsJob extends Job
{
    /**
     * @param UserRepository $userRepository
     * @return array
     */
    public function handle(UserRepository $userRepository): array
    {
        /** @var Collection $users */
        $users = $userRepository->getUserList([]);

        return $users->pluck('email')->toArray();
    }
}
