<?php

namespace App\Http\Services;

use App\Http\DTOs\ProjectCreateDto;
use App\Http\DTOs\TaskCreateDto;
use App\Http\DTOs\TaskUpdateDto;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskStatus;

class TaskService
{
    public function create(TaskCreateDto $dto): bool
    {
        $task = new Task();

        $task->name = $dto->name;
        $task->description = $dto->description;
        $task->priority = $dto->priority;
        $task->project_id = $dto->projectId;
        $task->performer_id = $dto->performerId;
        $task->created_by = auth()->user()->id;
        $task->type_id = $dto->typeId;
        $task->status_id = TaskStatus::DEFAULT_STATUS_ID;

        return $task->save();
    }

    public function update(Task $task, TaskUpdateDto $dto)
    {
        $task->name = $dto->name;
//        $task->description = $dto->description;
        $task->priority = $dto->priority;
        $task->performer_id = $dto->performerId;
        $task->status_id = $dto->statusId;
        $task->type_id = $dto->typeId;
        $task->sprint_id = $dto->sprintId;

        return $task->save();
    }
}
