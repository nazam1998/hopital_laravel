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
                <th scope="col">Registre</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Adresse</th>
                <th scope="col">Pays</th>
                <th scope="col">Ville</th>
                <th scope="col">Code Postal</th>
                <th scope="col">GSM</th>
                <th scope="col">Personne de contact</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr class="py-3">
                <th scope="row">{{ $patient->registre }}</th>
                <td>{{ $patient->nom }}</td>
                <td>{{ $patient->prenom }}</td>
                <td>{{ Carbon\Carbon::parse($patient->date_naissance)->format('d/m/Y') }}</td>
                <td>{{ $patient->adresse }}</td>
                <td>{{ $patient->pays }}</td>
                <td>{{ $patient->ville }}</td>
                <td>{{ $patient->code_postal }}</td>
                <td>{{ $patient->gsm }}</td>
                <td>{{ $patient->contact }} <br>{{ $patient->contact_gsm }}</td>
                <td></td>
                <td><a href="{{ route('dossier.index', $patient->registre) }}">Voir Dossiers</a></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
