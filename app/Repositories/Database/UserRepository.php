<?php

namespace App\Repositories\Database;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $credentials): Model|User
    {
        return User::query()->create($credentials);
    }
}
