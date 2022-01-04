<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    use HasFactory;
    function locals()
    {
        return $this->hasMany(Local::class, 'hopitals_id');
    }
}
