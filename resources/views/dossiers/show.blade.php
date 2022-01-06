<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dossier</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('welcome')}}"></a>
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
                    <td scope="col">Date Consultation</td>
                    <td scope="col">{{ $dossier->consultation->date . ' ' . $dossier->consultation->heure }}</td>
                </tr>
                <tr>
                    <td scope="col">Local de la consultation</td>
                    <td scope="col">{{ $dossier->consultation->local->nom }}</td>
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
</body>

</html>
