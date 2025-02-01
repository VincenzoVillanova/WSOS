<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class); // Un chef può avere più ristoranti
    }
}
