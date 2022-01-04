<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    function patient()
    {
        return $this->belongsTo(Patient::class, 'patients_id');
    }
    function docteur()
    {
        return $this->belongsTo(Docteur::class, 'docteurs_id');
    }
    function statut()
    {
        return $this->belongsTo(StatutConsultation::class, 'statut_consultation_id');
    }
}
