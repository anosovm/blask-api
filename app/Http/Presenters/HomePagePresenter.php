<?php

namespace App\Http\Presenters;

use App\Http\Resources\HomePage;

class HomePagePresenter
{
    public function present(): HomePage
    {
        $page = new HomePage();

        $page->projects = auth()->user()->projects();

        return $page;
    }
}
