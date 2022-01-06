@extends('layout.app')
@section('content')

    <h2 class="text-center">Hopitaux</h2>
    <ul class="mx-auto w-50">
        @foreach ($hopitals as $hopital)
            <a class="text-dark" href="{{ route('hopital', $hopital->id) }}">
                <div class="card p-5">
                    <h5>
                        {{ $hopital->nom }}
                    </h5>
                    <p class="card-text">{{ $hopital->adresse }}</p>
                </div>
            </a>
        @endforeach
    </ul>
@endsection
