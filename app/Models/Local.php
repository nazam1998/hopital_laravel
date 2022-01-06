<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    function hopital()
    {
        return $this->belongsTo(Hopital::class, 'hopitals_id');
    }
    function type()
    {
        return $this->belongsTo(TypeLocal::class, 'type_locals_id');
    }

    function consultations()
    {
        return $this->hasMany(Consultation::class, 'locals_id');
    }
}
