<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username;
        echo $password;
        // Aquí deberías verificar las credenciales del usuario con tu base de datos
    
        if($username === 'user' && $password === '111'){
            setcookie('username', $username, time() +10, "/"); // 86400 = 1 día
            header("Location: area_usuario.php");
        }else{
            echo "Nombre de usuario o contraseña incorrectos";
        }
    }
    
?>