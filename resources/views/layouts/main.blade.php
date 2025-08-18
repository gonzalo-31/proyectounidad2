<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8fafc; }
        .container { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #0001; padding: 2rem; margin-top: 3rem; }
    </style>
</head>
<body>
    <div class="container">
        @guest
            <div class="mb-3 text-end">
                <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar sesión</a>
                <a href="{{ route('registro') }}" class="btn btn-success">Registrarse</a>
            </div>
        @endguest
        @yield('content')
    </div>
    <footer class="text-center mt-5 mb-3 text-muted">
        <hr>
        <span>TechSolution &copy; {{ date('Y') }}</span>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Página cargada correctamente');
        });
    </script>
</body>
</html>
