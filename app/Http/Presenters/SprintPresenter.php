<?php

namespace App\Http\Presenters;

use App\Models\Sprint;
use App\Http\Resources\Sprint as SprintResult;

class SprintPresenter
{
    public function present(): SprintResult
    {
        $result = new SprintResult();
        $sprint = Sprint::with(['tasks', 'tasks.status', 'tasks.performer', 'tasks.type'])->where('project_id', 1)->first();

        $result->id = $sprint->id;
        $result->name = $sprint->name;
        $result->tasks = $sprint->tasks;

        return $result;
    }
}
