<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
