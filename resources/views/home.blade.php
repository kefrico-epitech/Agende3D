@extends('layout')

@php
    // dd($properties);
@endphp

@section('title', 'Accueil')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Bienvenue sur notre Agence3D</h1>
            <p>Dans cet exemple, nous avons utilisé Laravel 10 pour développer une application web.</p>
        </div>
    </div>
    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row mt-4">
            @forelse($properties as $property)
                <div class="col">
                    @include('shared.card')
                </div>
            @empty
                <div class="col"> Aucun résutat.... </div>
            @endforelse
        </div>
    </div>
@endsection
