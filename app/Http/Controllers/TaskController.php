<?php

namespace App\Http\Controllers;

use App\Http\Factories\TaskCreateFactory;
use App\Http\Factories\TaskUpdateFactory;
use App\Http\Queries\TaskQueries;
use App\Http\Resources\Task as TaskResource;
use App\Http\Resources\TaskShort;
use App\Http\Services\TaskService;
use App\Models\TaskStatus;
use App\Models\TaskType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TaskController extends BaseController
{
    public function index(Request $request, TaskQueries $queries)
    {
        return TaskShort::collection($queries->getTasksByProjectId($request->get('project_id')));
    }

    public function show(int $taskId, TaskQueries $queries)
    {
        return new TaskResource($queries->getById($taskId));
    }

    public function update(int $taskId, Request $request, TaskQueries $queries, TaskService $service)
    {
        $dto = TaskUpdateFactory::fromRequest($request);

        $task = $queries->getById($taskId);

        return $service->update($task, $dto);
    }

    public function create(Request $request, TaskService $service)
    {
        $dto = TaskCreateFactory::fromRequest($request);

        return $service->create($dto);
    }

    public function statuses()
    {
        return TaskStatus::all();
    }

    public function types()
    {
        return TaskType::all();
    }
}
