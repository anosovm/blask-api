<?php

namespace App\Http\Resources;

use App\Models\Task as TaskModel;

class Task extends AbstractResource
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
            'description'   => $task->description,
            'performer'     => new Performer($task->performer),
            'status'        => $task->status,
            'type'          => $task->type,
            'sprint_id'     => $task->sprint_id
        ];
    }
}
