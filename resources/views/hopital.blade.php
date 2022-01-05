<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $hopital->nom }}</title>
    <link rel="stylesheet" href="{{ @asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('patients') }}">Patients</a>
                </li>
            </ul>
        </div>
    </nav>
    <h2 class="text-center">{{ $hopital->nom }}</h2>
    <div class="text-center my-5">
        <a href="{{ route('hopital.show', $hopital->id) }}" class="text-dark mx-auto">Voir tous les
            patients</a>
    </div>
    <table class="table table-responsive table-striped rounded">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Nom Docteur</th>
                <th scope="col">local</th>
                <th scope="col">Nom Patient</th>
                <th scope="col">Statut Consultation</th>
                <th scope="col">Maladie</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultations as $consultation)
                <tr class="py-3">
                    <th scope="row">{{ $consultation->date . ' ' . $consultation->heure }} </th>
                    <td>{{ $consultation->docteur->nom }}</td>
                    <td>{{ $consultation->local->nom }}</td>
                    <td>{{ $consultation->patient->nom }}</td>
                    <td>{{ $consultation->statut->statut }}</td>
                    <td>@if ($consultation->dossier){{ $consultation->dossier->maladie->nom }}@else/ @endif</td>
                    <td><a href="{{ route('patient.show', $consultation->patient->registre) }}">Voir détails</a></td>
                </tr>

            @endforeach
        </tbody>
    </table>
</body>

</html>