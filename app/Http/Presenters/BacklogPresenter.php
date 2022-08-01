<?php

namespace App\Http\Presenters;

use App\Http\Queries\SprintQueries;
use App\Http\Queries\TaskQueries;
use App\Http\Resources\Backlog;

class BacklogPresenter
{
    public function __construct(
       private SprintQueries $sprintQueries,
       private TaskQueries $taskQueries,
    ) {}

    public function present(): Backlog
    {
        $result = new Backlog();

        $result->items = $this->sprintQueries->getSprintsByProjectId(1);

        $result->sprintlessItems = $this->taskQueries->getSprintlessTasksByProjectId(1);

        return $result;
    }
}
