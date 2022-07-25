<?php

namespace App\Http\Factories;

use App\Http\DTOs\ProjectCreateDto;
use Illuminate\Http\Request;

class ProjectCreateFactory
{
    public static function fromRequest(Request $request): ProjectCreateDto {
        $dto = new ProjectCreateDto();

        $dto->name = $request->get('name');
        $dto->description = $request->get('description');
        $dto->code = $request->get('code');

        return $dto;
    }
}
