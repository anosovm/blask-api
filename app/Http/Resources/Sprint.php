<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;

class Sprint
{
    public int $id;

    public string $name;

    public ?Collection $tasks;
}
