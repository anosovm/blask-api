<?php

namespace App\Http\Controllers;

use App\Http\Presenters\HomePagePresenter;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index(HomePagePresenter $presenter)
    {
        return response(['data' => $presenter->present()]);
    }
}
