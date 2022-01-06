@extends('layout.app')
@section('content')
    <h1 class="text-center mt-5">Dossiers des {{ $patient->nom . ' ' . $patient->prenom }}</h1>

    <table class="table table-responsive table-striped rounded">
        <thead>
            <tr>
                <th>Numéro de dossier</th>
                <th>Maladie</th>
                <th>Statut du Dossier</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patient->dossiers as $dossier)
                <tr class="py-3">
                    <th scope="row">{{ $dossier->id }}</th>
                    <td>{{ $dossier->maladie->nom }}</td>
                    <td>{{ $dossier->statut->nom }}</td>
                    <td><a href="{{ route('dossier.show', [$patient->registre, $dossier->id]) }}">Voir détails</a></td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
