<?php

namespace App\Http\Services;

use App\Http\DTOs\UserCreateDto;
use App\Models\User;

class UserService
{

    public function createUser(UserCreateDto $dto): User
    {
        return User::create([
           'name' => $dto->name,
            'email' => $dto->email,
            'password' => bcrypt($dto->password)
        ]);
    }
}
