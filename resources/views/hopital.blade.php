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
        <a class="navbar-brand" href="#"></a>
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
    <div class="text-center my-3">
        <a href="{{ route('hopital.show', $hopital->id) }}" class="text-dark mx-auto">Voir tous les patients</a>
    </div>
    {{-- Input Search --}}
    <div class=" w-25 my-4 mx-auto">
        <form action="{{ route('patient.consultation', [$hopital->id]) }}" action="GET" class="row justify-content-between">
            <input class="border px-4 py-1 mr-5" type="text" placeholder="Search" name="nom" aria-label="Search">
            <button class="btn btn-dark mt-2 col-4 mx-auto" type="submit">Search</button>
        </form>
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
            @foreach ($consultations as $data)
                <tr class="py-3">
                    <th scope="row">
                        {{ Carbon\Carbon::parse($data->consultation->date)->format('d/m/Y') . ' ' . $data->consultation->heure }}
                    </th>
                    <td>{{ $data->docteur->nom }}</td>
                    <td>{{ $data->local->nom }}</td>
                    <td>{{ $data->patient->nom . ' ' . $data->patient->prenom }}</td>
                    <td>{{ $data->status->statut }}</td>
                    <td>@if ($data->maladie){{ $data->maladie->nom }}@else/ @endif</td>
                    <td><a href="{{ route('patient.show', $data->patient->registre) }}">Voir détails du
                            patient</a>
                        @if ($data->maladie)
                            <a class="mx-3"
                                href="{{ route('dossier.show', [$data->patient->registre, $data->dossier->id]) }}">Voir
                                détails du
                                dossier</a>
                        @endif
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    <div class="text-center mx-auto mt-2 mb-5">
        {{ $consultations->links() }}
    </div>

</body>

</html>
