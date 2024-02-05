<?php

class Vista {

    public function formulario_completo() {
        ?>
        <form>
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



}