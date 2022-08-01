<?php

namespace App\Http\Controllers;

use App\Http\Presenters\BacklogPresenter;

class BacklogController
{
    public function index(BacklogPresenter $presenter)
    {
        return response(['data' => $presenter->present()]);
    }
}
