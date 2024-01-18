<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'STUCOM PELICULAS')</title>

    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <header class="bg-dark text-white text-center py-3">
        <div class="container">
            <h1 class="display-3">Películas</h1>
            <img src="{{ asset('img/logo.png') }}" alt="NETFLIX" class="img-fluid" style="max-height: 60px;">
        </div>
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <hr class="mb-4">
                    <p class="lead">Información de contacto:</p>
                    <address>
                        <strong>Kevin Sanchez Avila</strong><br>
                        Cataluña, España<br>
                        Teléfono: 99999999
                    </address>
                </div>
                <div class="col-md-6">
                    <hr class="mb-4">
                    <p class="lead">Enlaces útiles: </p>
                    <ul class="list-unstyled">
                        <li><a href="#">Términos de servicio</a></li>
                        <li><a href="#">Política de privacidad</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <p>&copy; {{ date('Y') }} STUCOM PELICULAS. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Incluye los scripts de Bootstrap (al final del body para un rendimiento óptimo) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>