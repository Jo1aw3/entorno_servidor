<!DOCTYPE html>
<html>
<head>
    <title>Formulario de ejemplo</title>
</head>
<body>
    <h2>Formulario de ejemplo</h2>
    
    <form method="POST" action="formularios00.php">
    	<fieldset>
    	<legend>Formulario (de Joshua)</legend>
    	
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
    
    		<label for="apellido">Apellido</label>
 			<input type="text" id="apellido" name="apellido" required><br><br>
    
            <label for="edad">Edad</label>
            <input type="number" id="edad" name="edad" min="15" max="80" required><br><br>
        
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];

    // Aquí puedes realizar acciones con los datos, como enviar un correo electrónico o guardarlos en una base de datos.

    echo "¡Gracias por enviar el formulario, $nombre!";
}
?>