<?php

namespace App\Http\Controllers;

use App\Http\Presenters\SprintPresenter;

class SprintController
{
    public function index(SprintPresenter $presenter)
    {
        return response(['data' => $presenter->present()]);
    }

    public function create(SprintService $service)
    {

    }
}
