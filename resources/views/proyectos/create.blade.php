@extends('layouts.app')

@section('content')
    <h1>Crear Proyecto</h1>
    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="date" name="fecha_inicio" required><br>
        <input type="text" name="estado" placeholder="Estado" required><br>
        <input type="text" name="responsable" placeholder="Responsable" required><br>
        <input type="number" name="monto" placeholder="Monto" required><br>
        <button type="submit" class="btn btn-success">Guardar proyecto</button>
    </form>
@endsection
