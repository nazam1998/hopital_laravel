@extends('layout.app')
@section('content')
    <h2 class="text-center">Liste des Patients</h2>
    <table class="table table-responsive table-striped rounded">
        <thead>
            <tr>
                <th scope="col">Registre</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr class="py-3">
                    <th scope="row">{{ $patient->registre }}</th>
                    <td>{{ $patient->nom }}</td>
                    <td>{{ $patient->prenom }}</td>
                    <td>{{ Carbon\Carbon::parse($patient->date_naissance)->format('d/m/Y') }}</td>
                    <td><a href="{{ route('patient.show', $patient->registre) }}">Voir détails du patient</a></td>
                </tr>

            @endforeach
        </tbody>
    </table>
    <div class="mx-auto text-center">
        {{$patients->links()}}
    </div>
@endsection
