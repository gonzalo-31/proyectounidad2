@extends('layouts.main')

@section('content')
    <h1>Registro de usuario</h1>
    <form method="POST" action="{{ url('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Nombre" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required><br>
        <button type="submit" class="btn btn-success">Registrarse</button>
    </form>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
