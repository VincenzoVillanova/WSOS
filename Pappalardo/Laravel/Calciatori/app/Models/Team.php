<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function player()
    {
        return $this->hasMany(Player::class);
    }
}
