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
}
