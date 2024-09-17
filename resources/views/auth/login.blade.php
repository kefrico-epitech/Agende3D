@extends('layout')

@section('title', 'Se connerter')

@section('content')

    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        @include('shared.flash')


        <form action="{{ route('login') }}" method="post">
            @csrf

            @include('shared.input', [
                'type' => 'email',
                'class' => 'col my-4',
                'name' => 'email',
                'label' => 'Email',
            ])
            @include('shared.input', [
                'type' => 'password',
                'class' => 'col my-4',
                'name' => 'password',
                'label' => 'Mot de passe',
            ])

            <div class="">
                <button type="submit" class="btn btn-primary">Se Connecter </button>
            </div>
        </form>
    </div>

@endsection
