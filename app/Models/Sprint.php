<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sprint extends Model
{
    public $fillable = [
        'name',
        'date_start',
        'date_end',
        'project_id',
        'created_at'
    ];

    public $timestamps = false;

    public $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
        'created_at' => 'date'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'sprint_id','id');
    }
}
