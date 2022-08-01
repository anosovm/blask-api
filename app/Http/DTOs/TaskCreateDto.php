<?php

namespace App\Http\DTOs;

class TaskCreateDto
{
    public string $name;

    public string $description;

    public int $projectId;

    public int $performerId;

    public int $priority;
}
