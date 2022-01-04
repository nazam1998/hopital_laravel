<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        h2 {
            text-align: center;
        }

    </style>
</head>

<body>
    <h2>Hospitals</h2>
    <ul>
        @foreach ($hopitals as $hopital)
            <li><a href="{{ route('hopital', $hopital->id) }}">{{ $hopital->nom }}</a></li>
        @endforeach
    </ul>
</body>

</html>
