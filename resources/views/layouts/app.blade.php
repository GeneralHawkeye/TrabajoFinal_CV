<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CV Generator')</title>

    <!-- Agregar el CDN de Bootstrap para los estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    @yield('head') <!-- Para incluir contenido adicional en el head -->
</head>
<body>
    <!-- Contenido de la vista -->
    @yield('content')

    <!-- Agregar el CDN de Bootstrap para los scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    @yield('scripts') <!-- Para incluir scripts adicionales -->
</body>
</html>
