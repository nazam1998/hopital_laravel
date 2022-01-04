<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docteur extends Model
{
    use HasFactory;

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'docteurs_id');
    }
}
