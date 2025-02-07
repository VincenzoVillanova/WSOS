<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function genere()
    {
        return $this->belongsTo(Genere::class);
    }
}
