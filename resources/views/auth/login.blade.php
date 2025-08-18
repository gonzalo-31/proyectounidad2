@extends('layouts.main')

@section('content')
    <h1>Iniciar sesión</h1>
    <form method="POST" action="{{ url('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
@endsection
