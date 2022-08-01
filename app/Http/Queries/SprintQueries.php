<?php

namespace App\Http\Queries;

use App\Models\Sprint;
use Illuminate\Database\Eloquent\Collection;

class SprintQueries
{
    public function getSprintsByProjectId(int $projectId): Collection
    {
        return Sprint::with(['tasks', 'tasks.performer', 'tasks.status', 'tasks.type'])->where('project_id', $projectId)->get();
    }

    public function getCountSprintsByProjectIdForCurrentYear(int $projectId): int
    {
        return Sprint::where('project_id', $projectId)->where('created_at', '>', now()->startOfYear())->count();
    }
}
