<?php

namespace App\Http\Queries;

use App\Models\Project;

class ProjectQueries
{
    public function getById(int $projectId): Project
    {
        return Project::where('id', $projectId)->first();
    }
}
