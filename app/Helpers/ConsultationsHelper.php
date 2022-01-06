<?php

namespace App\Helpers;

use App\Models\Docteur;
use App\Models\Dossier;
use App\Models\Local;
use App\Models\Maladie;
use App\Models\Patient;
use App\Models\StatutConsultation;
    
class ConsultationsHelper
{
    public static function concat($consultations)
    {
        $datas = [];

        foreach ($consultations as $consultation) {
            $patient = Patient::where('registre', $consultation->patients_id)->first();
            $local = Local::where('id', $consultation->locals_id)->first();
            $docteur = Docteur::where('id', $consultation->docteurs_id)->first();
            $status = StatutConsultation::where('id', $consultation->statut_consultations_id)->first();
            $dossier = Dossier::where('consultations_id', $consultation->id)->first();
            if ($dossier != null) {
                $maladie = Maladie::where('id', $dossier->maladies_id)->first();
            } else {
                $maladie = null;
            }
            $myData = [
                'consultation' => $consultation,
                'patient' => $patient,
                'local' => $local,
                'docteur' => $docteur,
                'status' => $status,
                'dossier' => $dossier,
                'maladie' => $maladie,
            ];
            array_push($datas, (object)($myData));
        }
        $showPerPage = 20;
        $consultations =collect($datas);
        return PaginationHelper::paginate($consultations, $showPerPage);

    }


}
