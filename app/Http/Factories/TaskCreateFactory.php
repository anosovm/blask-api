<?php

namespace App\Http\Factories;

use App\Http\DTOs\ProjectCreateDto;
use App\Http\DTOs\TaskCreateDto;
use Illuminate\Http\Request;

class TaskCreateFactory
{
    public static function fromRequest(Request $request): TaskCreateDto {
        $dto = new TaskCreateDto();

        $dto->name = $request->get('name');
        $dto->description = $request->get('description');
        $dto->priority = $request->get('priority');
        $dto->performerId = $request->get('performer_id');
        $dto->projectId = $request->get('project_id');
        $dto->typeId = $request->get('type_id');

        return $dto;
    }
}
