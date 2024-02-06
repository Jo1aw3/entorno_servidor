<?php

class bista {

    public function login($path) {
        ?>
        <form action="controlador/loginC.php" method="POST">
            <input type="text" name="erabiltzailea" placeholder="Erabiltzailea" required>
            <input type="password" name="pasahitza" placeholder="Pasahitza" required>
            <img src="<?php echo $path; ?>" alt="captcha">
            <input type="text" name="captcha" placeholder="Sartu hemen" required>
            <input type="submit" value="Sartu" name="b_bidali_login">

        </form>
        <?php
    }
    public function register() {
        ?>
        <form action="controlador/registerC.php" method="post">
            <input type="text" name="erabiltzailea" placeholder="Erabiltzailea" required>
            <input type="password" name="pasahitza" placeholder="Pasahitza" required>
            <input type="submit" value="Erregistratu" name="b_bidali_register">
        </form>
        <?php
    }

    public function bueltatu() {
        ?>
        <a href="../index.php">Atzera</a>
        <?php
    }
}
?>