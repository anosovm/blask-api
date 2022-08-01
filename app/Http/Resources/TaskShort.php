<?php

namespace App\Http\Resources;

use App\Models\Task as TaskModel;

class TaskShort extends AbstractResource
{
    public function toArray($request): array
    {
        /** @var TaskModel $task */
        $task = $this->resource;

        return [
            'id'            => $task->id,
            'code'          => $task->project->code . '-' . $task->id,
            'name'          => $task->name,
            'priority'      => $task->priority,
            'performer'     => new Performer($task->performer),
            'status'        => $task->status,
            'type'          => $task->type
        ];
    }
}
