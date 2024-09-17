@extends('layout')

@section('title', $property->title)

@section('content')
    <div class="container my-4">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>

        <div class="text-primary" style='font-size: 4rem;font-weight: bold;'>
            {{ number_format($property->price, thousands_separator: ' ') }} $
        </div>

        <hr>

        <div class="mt-4">
            <h4>Interessé par ce bien ?</h4>
            @include('shared.flash')

            <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', [
                        'class' => 'col my-4',
                        'name' => 'firstname',
                        'label' => 'Prénom',
                        'value' => 'John',
                    ])
                    @include('shared.input', [
                        'class' => 'col my-4',
                        'name' => 'lastname',
                        'label' => 'Nom',
                        'value' => 'Doe',
                    ])
                </div>
                <div class="row">
                    @include('shared.input', [
                        'type' => 'number',
                        'class' => 'col my-4',
                        'name' => 'phone',
                        'label' => 'Téléphone',
                        'value' => '97818212',
                    ])
                    @include('shared.input', [
                        'type' => 'email',
                        'class' => 'col my-4',
                        'name' => 'email',
                        'value' => 'kefrico99@gmail.com',
                    ])
                </div>
                @include('shared.input', [
                    'type' => 'textarea',
                    'class' => 'col my-4',
                    'name' => 'message',
                    'label' => 'Votre message',
                    'value' => 'Je suis interessé par votre résidence',
                ])
                <div class="my-">
                    <button class="btn btn-primary">
                        Nous contacter
                    </button>
                </div>
            </form>
        </div>

        <hr>

        <div class="mt-4">
            <p>{{ nl2br($property->description) }}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>{{ $property->address }}, {{ $property->city }} ({{ $property->postal_code }})</td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
