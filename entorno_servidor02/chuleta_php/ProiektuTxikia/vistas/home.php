<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>

<body>
    <h1>Bienvenido a la Biblioteca</h1>
    <ul>
        <li><a href="<?php echo BASE_URL; ?>?action=mostrarHome">Inicio</a></li>
        <li><a href="<?php echo BASE_URL; ?>?action=listarLibros">Lista de Libros</a></li>
        <!-- Agrega más enlaces según sea necesario -->
    </ul>
</body>

</html>