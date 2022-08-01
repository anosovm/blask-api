<?php

namespace App\Http\Factories;

use App\Http\DTOs\TaskUpdateDto;
use Illuminate\Http\Request;

class TaskUpdateFactory
{
    public static function fromRequest(Request $request): TaskUpdateDto {
        $dto = new TaskUpdateDto();

        $dto->name = $request->get('name');
//        $dto->description = $request->get('description');
        $dto->priority = $request->get('priority');
        $dto->performerId = $request->get('performer_id');
        $dto->statusId = $request->get('status_id');
        $dto->typeId = $request->get('type_id');
        $dto->sprintId = $request->get('sprint_id');

        return $dto;
    }
}
