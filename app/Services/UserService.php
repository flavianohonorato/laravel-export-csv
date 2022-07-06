<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return User::create($data);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return User::query()
            ->orderBy('id', 'ASC')
            ->get()
            ->toArray();
    }
}
