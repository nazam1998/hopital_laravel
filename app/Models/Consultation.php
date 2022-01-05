<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    function patient()
    {
        return $this->belongsTo(Patient::class, 'patients_id', 'registre');
    }
    function docteur()
    {
        return $this->belongsTo(Docteur::class, 'docteurs_id');
    }
    function statut()
    {
        return $this->belongsTo(StatutConsultation::class, 'statut_consultations_id');
    }
    function local()
    {
        return $this->belongsTo(Local::class, 'locals_id');
    }
    function dossier()
    {
        return $this->hasOne(Dossier::class, 'consultations_id');
    }
}
