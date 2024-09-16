@extends('admin.layout')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')
    <h1>@yield('title')</h1>

    <form class="col" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}"
        method="post">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row my-4">
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $property->title,
            ])
            <div class="col row">
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'surface',
                    'value' => $property->surface,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Prix',
                    'name' => 'price',
                    'value' => $property->price,
                ])
            </div>
        </div>
        @include('shared.input', [
            'class' => 'my-4',
            'type' => 'textarea',
            'name' => 'description',
            'value' => $property->description,
        ])
        <div class="row my-4">
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Pièces',
                'name' => 'rooms',
                'value' => $property->rooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Chambres',
                'name' => 'bedrooms',
                'value' => $property->bedrooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Etages',
                'name' => 'floor',
                'value' => $property->floor,
            ])
        </div>
        <div class="row my-4">
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Adresse',
                'name' => 'address',
                'value' => $property->address,
            ])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Ville',
                'name' => 'city',
                'value' => $property->city,
            ])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Code postal',
                'name' => 'postal_code',
                'value' => $property->postal_code,
            ])
        </div>
        @include('shared.checkbox', [
            'class' => 'my-4',
            'label' => 'Disponible',
            'name' => 'sold',
            'value' => $property->sold,
        ])
        <div class="d-flex gap-4">
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
            <a href="{{ route('admin.property.index') }}" class="btn btn-secondary">Retour</a>
        </div>
        </div>
    </form>

@endsection
