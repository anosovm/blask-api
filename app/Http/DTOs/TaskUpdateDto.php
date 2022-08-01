<?php

namespace App\Http\DTOs;

class TaskUpdateDto
{
    public string $name;

    public string $description;

    public int $projectId;

    public ?int $performerId;

    public int $priority;

    public ?int $statusId;

    public ?int $typeId;

    public ?int $sprintId;
}
