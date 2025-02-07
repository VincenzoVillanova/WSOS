<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class task extends Model
{
    public function project()
    {
        return $this->BelongsTo(Project::class);
    }
}
