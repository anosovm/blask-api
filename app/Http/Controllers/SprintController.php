<?php

namespace App\Http\Controllers;

use App\Http\Presenters\SprintPresenter;
use App\Http\Queries\ProjectQueries;
use App\Http\Services\SprintService;
use Illuminate\Http\Request;

class SprintController
{
    public function index(SprintPresenter $presenter)
    {
        return response(['data' => $presenter->present()]);
    }

    public function create(SprintService $service, Request $request, ProjectQueries $projectQueries)
    {
        $project = $projectQueries->getById($request->get('project_id'));

        return $service->create($project);
    }
}
