<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des patients</title>
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
</body>

</html>
