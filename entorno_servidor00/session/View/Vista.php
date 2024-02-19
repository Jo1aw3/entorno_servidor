<?php
class Vista {

    public function inicio_sesion () {
    ?>
        <form method="POST" action="Controller/Controlador.php">
            <label>Nombre de usuario:</label>
            <input type="text" name="username">
            <br>
            <label>Contraseña:</label> 
            <input type="password" name="password">
            <br>
            <input type="submit" name="iniciar" value="Iniciar sesión">
        </form>
    <?php
    }

    public function vista_usuario () {
    ?>
        <h1>Bienvenido Usuario</h1>
    <?php
    }

    public function vista_admin () {
    ?>
        <h1>Bienvenido Administrador</h1>
    <?php
    }

}