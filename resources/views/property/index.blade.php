@extends('layout')

@section('title', 'Tous nos biens')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Surface min" class="form-control" name="surface"
                value="{{ $inputs['surface'] ?? '' }}">
            <input type="number" placeholder="Nombre de pièce min" class="form-control" name="rooms"
                value="{{ $inputs['rooms'] ?? '' }}">
            <input type="number" placeholder="Budget max" class="form-control" name="price"
                value="{{ $inputs['price'] ?? '' }}">
            <input type="text" placeholder="Mot clef" class="form-control" name="title"
                value="{{ $inputs['title'] ?? '' }}">
            <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse($properties as $property)
                <div class="col">
                    @include('shared.card')
                </div>
            @empty
                <div class="col">
                    <h3 class="text-center">Aucun résutat....</h3>
                </div>
            @endforelse
        </div>
    </div>
    <div class="container my-4">
        {{ $properties->links() }}
    </div>
@endsection
