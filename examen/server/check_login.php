<?php
require('conexion.php');
session_start();

if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
    
    $usuario = mysqli_real_escape_string($conexion, $_POST["usuario"]);
    $pass = mysqli_real_escape_string($conexion, $_POST["contrasena"]);
    $cifrado = md5($pass);

    $sql = "SELECT id_usuario
    FROM usuario 
    WHERE (correo='$usuario' OR users='$usuario') AND pass='$cifrado'";
    
    $result = mysqli_query($conexion, $sql);
    $num_row = mysqli_num_rows($result);
    
    if ($num_row == "1") {
        $data = mysqli_fetch_array($result);
        $_SESSION['id'] = $data[0];
        echo "1";
    }else{
        echo " Error, no se encuentra registrado!!";
    }
}else{
    echo " Error, en la validacion de los datos"."<br>";
}
 ?>
