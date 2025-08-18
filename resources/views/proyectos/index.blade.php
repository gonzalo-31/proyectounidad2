@extends('layouts.app')

@section('content')
    <h1>Lista de Proyectos</h1>
    @auth
        <p>Bienvenido, {{ Auth::user()->name }}</p>
    @endauth
    <a href="{{ route('proyectos.create') }}" class="btn btn-success mb-3">Crear nuevo proyecto</a>
    <div class="alert alert-info mb-3">
        <strong>UF diaria:</strong> {{ $uf ?? 'No disponible' }}
    </div>
    <ul>
        @foreach($proyectos as $proyecto)
            <li class="mb-4 p-3 border rounded">
                <p><strong>Nombre proyecto:</strong> {{ $proyecto->nombre }}</p>
                <p><strong>Fecha inicio:</strong> {{ $proyecto->fecha_inicio }}</p>
                <p><strong>Estado:</strong> {{ $proyecto->estado }}</p>
                <p><strong>Responsable:</strong> {{ $proyecto->responsable }}</p>
                <p><strong>Monto:</strong> {{ $proyecto->monto }}</p>
                <p><strong>Creado por:</strong> {{ $proyecto->creador ? $proyecto->creador->name : 'Desconocido' }}</p>

                <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
