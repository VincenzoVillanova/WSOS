<?php

namespace App\Models;

use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function task()
    {
        $this->hasMany(Task::class);
    }
}
