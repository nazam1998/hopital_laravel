@extends('layout.app')
@section('content')
    <h1 class="text-center mt-5">Dossier de {{ $patient->nom . ' ' . $patient->prenom }}</h1>
    <div class="container">

        <table class="table table-striped table-responsive">
            <tbody>
                <tr>
                    <td scope="col">Registre</td>
                    <td scope="col">{{ $patient->registre }}</td>
                </tr>
                <tr>
                    <td scope="col">Nom Patient</td>
                    <td scope="col">{{ $patient->nom . ' ' . $patient->prenom }}</td>
                </tr>
                <tr>
                    <td scope="col">Nom Docteur</td>
                    <td scope="col">{{ $dossier->consultation->docteur->nom }}</td>
                </tr>
                <tr>
                    <td scope="col">Expériences du Docteur</td>
                    <td scope="col">{{ $dossier->consultation->docteur->experience }} année(s)</td>
                </tr>
                <tr>
                    <td scope="col">Spécialisation du Docteur</td>
                    <td scope="col">{{ $dossier->consultation->docteur->specialisation }}</td>
                </tr>
                <tr>
                    <td scope="col">Date Consultation</td>
                    <td scope="col">{{ $dossier->consultation->date . ' ' . $dossier->consultation->heure }}</td>
                </tr>
                <tr>
                    <td scope="col">Local de la consultation</td>
                    <td scope="col">
                        {{ $dossier->consultation->local->nom . ' (' . $dossier->consultation->local->type->nom . ')' }}</td>
                </tr>
                <tr>
                    <td scope="col">Maladie</td>
                    <td scope="col">{{ $dossier->maladie->nom }}</td>
                </tr>
                <tr>
                    <td scope="col">Traitement</td>
                    <td scope="col">{{ $dossier->maladie->curable ? $dossier->maladie->traitement : 'Incurable' }}
                    </td>
                </tr>
                <tr>
                    <td scope="col">Statut Dossier</td>
                    <td scope="col">{{ $dossier->statut->nom }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
