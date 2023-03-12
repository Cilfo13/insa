@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Vista de producto</h1>
        <p class="lead">{{$equipo->nombre}}</p>
        <p>Nombre del cliente: {{$equipo->users->name}}</p>
        Seguir desarrollando para mas opciones
    </div>
@endsection