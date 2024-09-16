@extends('admin.layout')

@section('title', $option->exists ? 'Editer une option' : 'Créer une option')

@section('content')
    <h1>@yield('title')</h1>

    <form class="col" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}"
        method="post">
        @csrf
        @method($option->exists ? 'put' : 'post')

        <div class="row ">
            @include('shared.input', [
                'class' => 'col my-4',
                'label' => 'Titre',
                'name' => 'name',
                'value' => $option->name,
            ])
            <div class="d-flex gap-4">
                <button class="btn btn-primary">
                    @if ($option->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
                <a href="{{ route('admin.option.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </form>

@endsection
