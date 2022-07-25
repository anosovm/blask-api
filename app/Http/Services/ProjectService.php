<?php

namespace App\Http\Services;

use App\Http\DTOs\ProjectCreateDto;
use App\Models\Project;

class ProjectService
{
    public function create(ProjectCreateDto $dto): bool
    {
        $project = new Project();

        $project->name = $dto->name;
        $project->description = $dto->description;
        $project->code = $dto->code;
        $project->created_by = auth()->user()->id;

        return $project->save();
    }
}
