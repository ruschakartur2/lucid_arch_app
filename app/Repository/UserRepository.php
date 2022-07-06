<?php

namespace App\Repository;

use App\Models\User;

class UserRepository extends Repository
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * @param array $relation
     * @return mixed
     */
    public function getUserList(array $relation)
    {
        $query = $this->model
            ->with($relation);

        $query = $this->userFilter($query);

        return $query->get();
    }

    /**
     * @param $query
     * @return mixed
     */
    private function userFilter($query)
    {
        return $query;
    }
}
