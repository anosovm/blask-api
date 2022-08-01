<?php

namespace App\Http\Queries;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskQueries
{
    public function getTasksByProjectId(int $projectId): Collection
    {
        return Task::with(['performer', 'status', 'type'])->where('project_id', $projectId)->orderByDesc('priority')->get();
    }

    public function getSprintlessTasksByProjectId(int $projectId): Collection
    {
        return Task::with(['performer', 'status', 'type'])
            ->where('project_id', $projectId)
            ->whereNull('sprint_id')
            ->orderByDesc('priority')
            ->get();
    }

    public function getById(int $taskId)
    {
        return Task::with(['type','performer', 'status'])->where('id', $taskId)->where(function($query) {
                $query->where('performer_id', auth()->id())->orWhere('created_by', auth()->id());
            })->first();
    }
}
