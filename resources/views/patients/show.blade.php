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
    <h1 class="text-center mt-5">Détails de {{ $patient->nom . ' ' . $patient->prenom }}</h1>
    @if ($patient->dossiers()->count() > 0)
        <div class="text-center my-4">
            <a href="{{ route('dossier.index', $patient->registre) }}">Voir Dossiers</a>
        </div>
    @endif
    <div class="container mx-auto">

        <table class="table table-responsive table-striped rounded">
            <tbody>
                <tr>
                    <th>Registre</th>
                    <td>{{ $patient->registre }}</td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td>{{ $patient->nom }}</td>
                </tr>
                <tr>

                    <th>Prénom</th>
                    <td>{{ $patient->prenom }}</td>
                </tr>
                <tr>
                    <th>Date de naissance</th>
                    <td>{{ Carbon\Carbon::parse($patient->date_naissance)->format('d/m/Y') }}</td>
                </tr>
                <tr>

                    <th>Adresse</th>
                    <td>{{ $patient->adresse }}</td>
                </tr>
                <tr>
                    <th>Ville</th>
                    <td>{{ $patient->ville }}</td>
                </tr>
                <tr>
                    <th>Pays</th>
                    <td>{{ $patient->pays }}</td>
                </tr>
                <tr>
                    <th>Code Postal</th>
                    <td>{{ $patient->code_postal }}</td>
                </tr>
                <tr>

                    <th>GSM</th>
                    <td>{{ $patient->gsm }}</td>
                </tr>
                <tr>

                    <th>Personne de contact</th>
                    <td>{{ $patient->contact }}</td>
                </tr>
                <tr>
                    <th>Numéro de Personne de contact</th>
                    <td>{{ $patient->contact_gsm }}</td>
                </tr>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
