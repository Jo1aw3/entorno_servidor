<?php

class Login_Bista {

    public function Login() {
        ?>
        <form method="POST" action="kontrolatzaile.php">
            <div >
                <div >
                    <label><b>Erabiltzailea/ Usuario</b></label>
                    <input type="text" placeholder="Sartu Erabiltzaile izena" name="erab_usuario"/>
                </div>

                <div>
                    <label><b>Pasahitza/ Contraseña</b></label>
                    <input type="password" placeholder="Sartu pasahitza" name="ph"/>
                </div>     
                <br>
                <input type="submit" value="Sartu/Entrar" name="b_sartu_entrar"/>
                <input type="submit" value="Alta/Dar Alta" name="a_alta"/>
            </div>
        </form>
        <?php
    }

    public function Alta(){
        ?>
        <form method="POST" action="kontrolatzaile.php">
            <div >
            <div >
                    <label><b>Nuevo Dni</b></label>
                    <input type="text" placeholder="Sartu Erabiltzaile izena" name="dni_usuario"/>
                </div>
                <div >
                    <label><b>Erabiltzailea/ Usuario</b></label>
                    <input type="text" placeholder="Sartu Erabiltzaile izena" name="erab_usuario"/>
                </div>

                <div>
                    <label><b>Pasahitza/ Contraseña</b></label>
                    <input type="password" placeholder="Sartu pasahitza" name="ph"/>
                </div>     
                <br>
                <input type="submit" value="Alta/Dar Alta" name="a_alta_usuario"/>
            </div>
        </form>
        <?php
    }

    public function informacion_server(){
        ?>
        <form method="POST" action="kontrolatzaile.php">
            <div >
                <input type="submit" value="InfoServer" name="info_server"/>
            </div>
        </form>
        <?php
    }

    public function cookies(){
        ?>
        <form method="POST" action="kontrolatzaile.php">
            <div >
                <input type="submit" value="cookiesServer" name="cookies_server"/>
            </div>
        </form>
        <?php
    }

    public function volverAtras() {
        ?>
        <form method="POST" action="kontrolatzaile.php">
            <div>
               
                <button type="button" onclick="window.location.href='index.php'">Volver Atrás</button>
            </div>
        </form>
        <?php
    }
}