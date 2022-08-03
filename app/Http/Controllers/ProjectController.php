<?php

namespace App\Http\Controllers;

use App\Http\Factories\ProjectCreateFactory;
use App\Http\Services\ProjectService;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProjectController extends BaseController
{
    public function create(Request $request, ProjectService $projectService): bool
    {
        $dto = ProjectCreateFactory::fromRequest($request);

        return $projectService->create($dto);
    }

    public function index()
    {
        return Project::with(['creator'])->whereHas('owners', function ($query) {
           $query->where('id', auth()->user()->id);
        })->get();
    }
}
