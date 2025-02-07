<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genere extends Model
{
    public function film()
    {
        return $this->hasMany(Film::class);
    }
}
