<?php

namespace App\Http\Factories;

use App\Http\DTOs\UserCreateDto;
use Illuminate\Http\Request;

class UserCreateFactory
{
    public static function fromRequest(Request $request): UserCreateDto {
        $dto = new UserCreateDto();

        $dto->name = $request->get('name');
        $dto->email = $request->get('email');
        $dto->password = $request->get('password');

        return $dto;
    }
}
