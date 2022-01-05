<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $patient->nom . ' ' . $patient->prenom }}</title>
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
    <h1 class="text-center mt-5">Dossier de {{ $patient->nom . ' ' . $patient->prenom }}</h1>

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
</body>

</html>
