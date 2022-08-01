<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;

class Backlog
{
    public ?Collection $items;

    public ?Collection $sprintlessItems;
}
