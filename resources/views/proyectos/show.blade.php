@extends('layouts.app')

@section('content')
    <h1>{{ $proyecto->nombre }}</h1>
    <p><strong>Fecha inicio:</strong> {{ $proyecto->fecha_inicio }}</p>
    <p><strong>Estado:</strong> {{ $proyecto->estado }}</p>
    <p><strong>Responsable:</strong> {{ $proyecto->responsable }}</p>
    <p><strong>Monto:</strong> {{ $proyecto->monto }}</p>
    <a href="{{ route('proyectos.edit', $proyecto->id) }}">Editar</a>
    <a href="{{ route('proyectos.index') }}">Volver a la lista</a>
@endsection
