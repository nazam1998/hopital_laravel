<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $hopital->nom }}</title>
    <style>
        h2 {
            text-align: center;
        }

    </style>
</head>

<body>
    <h2>{{ $hopital->nom }}</h2>
    @foreach ($hopital->locals as $local)
        {{ $local->consultations }}
    @endforeach
</body>

</html>
