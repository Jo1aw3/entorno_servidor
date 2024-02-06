<?php

class Vista {

    public function formulario_completo() {
        ?>
        <form method="POST" action="controlador.php">
            <div>
                <div>
                    <label>Usuario:</label>
                    <input type="text" placeholder="nombre de usuario" name="userName"/>
                </div>
                <div>
                    <label>Contraseña:</label>
                    <input type="password" placeholder="clave de acceso" name="userPass"/>
                </div>
                <br>
                <div>
                    <label>¿Que quieres hacer?</label>
                </div>
                <input type="radio" value="puntuacion" name="opcion"/> Listado de Puntuaciones
                <input type="radio" value="jugar" name="opcion"/> Jugar
                <br>
                <br>
                <input type="submit" value="iniciar" name="boton"/>
            </div>
        </form>
        <?php
    }

    public function formulario_opciones() {
        ?>
        <form method="POST" action="controlador.php">
            <div>
                <div>
                    <label>¿Que quieres hacer?</label>
                </div>
                <input type="radio" value="puntuacion" name="opcion"/> Listado de Puntuaciones
                <input type="radio" value="jugar" name="opcion"/> Jugar
                <br>
                <br>
                <input type="submit" value="iniciar" name="boton"/>
            </div>
        </form>
        <?php
    }

    public function mostrar_puntuaciones($array_asociativo) {
        ?>
        <table border="1">
            <tr>
                <th>Usuario</th>
                <th>Puntuacion</th>
            </tr>       
            <?php
            foreach ($array_asociativo as $usuario => $puntuacion) {
            ?>
            <tr>
                <td><?php echo($usuario); ?></td>
                <td><?php echo($puntuacion); ?></td>
            </tr>
            <?php
            }
            ?>     
        </table>
        <?php
    }

    public function PreguntasRespuestas($array_asociativo) {
       
        $contador = 0;
        echo '<form method="POST" action="controlador.php">';
        foreach ($array_asociativo as $pregunta => $respuestas) {
            echo '<div>';
            echo '<label>' . $pregunta . '</label>';
            echo '<select name="pregunta' . $contador++ . '">';
            foreach ($respuestas as $respuesta) {
                echo '<option value="' . $respuesta . '">' . $respuesta . '</option>';
            }
            echo '</select>';
            echo '</div>';
        }
        echo '<input type="submit" value="enviar" name="boton_enviar">';
        echo '</form>';

    }

}