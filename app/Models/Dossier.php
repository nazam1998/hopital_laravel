<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;
    public function maladie()
    {
        return $this->belongsTo(Maladie::class, 'maladies_id');
    }
    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultations_id');
    }
    public function statut()
    {
        return $this->belongsTo(StatutDossier::class, 'statut_dossiers_id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patients_id', 'registre');
    }
}
