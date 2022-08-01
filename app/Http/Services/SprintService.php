<?php

namespace App\Http\Services;

use App\Http\Queries\SprintQueries;
use App\Models\Project;
use App\Models\Sprint;

class SprintService
{
    public function __construct(
       private SprintQueries $sprintQueries
    ) {}

    public function create(Project $project)
    {
        $sprintCount = $this->sprintQueries->getCountSprintsByProjectIdForCurrentYear($project->id);

        if (!$sprintCount) {
            $sprintCount = 1;
        } else {
            $sprintCount++;
        }

        $sprintName = $project->code . ' sprint ' . now()->format('y') . '/'. $sprintCount;

        return Sprint::create([
            'name' => $sprintName,
            'project_id' => $project->id,
            'created_at' => now()
        ]);
    }
}
