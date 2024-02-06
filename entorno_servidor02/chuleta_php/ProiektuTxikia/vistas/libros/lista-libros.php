<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
</head>

<body>
    <h1>Lista de Libros</h1>
    <ul>
        <?php foreach ($libros as $libro) : ?>
            <li><?php echo $libro['titulo']; ?> - <?php echo $libro['autor']; ?></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="<?php echo BASE_URL; ?>">Volver a la página principal</a></p>
</body>

</html>