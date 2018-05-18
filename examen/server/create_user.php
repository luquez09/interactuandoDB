<?php
    /*llamamos la conexion para poder realizar la insercion de los datos a la base de datos*/
require('conexion.php');


/**Insercion del 1 usuario a la base de datos */
$usuario = 'next_u';
$correo = 'correo1@correo1.com';
$contrasena = md5('next_u');
$fecha = '1994/02/04';

try {
    $sql = "INSERT INTO usuario(users, pass,correo,fecha_nac) VALUES('$usuario', '$contrasena','$correo','$fecha')";

    if($conexion->query($sql)===TRUE){
        echo "Usuario 1 Registrado";
    }else{
        echo "Error Insert";
    }
} catch (Exception $e) {
    echo 'exception: ',  $e->getMessage(), "\n";
}

/**Insercion del 2 usuario a la base de datos */
$usuario = 'ivan';
$contrasena = md5('luquez');
$correo = 'correo2@correo2.com';
$fecha = '1196/04/08';

try {
    $sql = "INSERT INTO usuario(users, pass,correo,fecha_nac) VALUES('$usuario', '$contrasena','$correo','$fecha')";

    if($conexion->query($sql)===TRUE){
        echo "Usuario 2 Registrado";
    }else{
        echo "Error Insert";
    }
} catch (Exception $e) {
    echo 'exception: ',  $e->getMessage(), "\n";
}

/**Insercion del 3 usuario a la base de datos */
$usuario = 'usuario3';
$contrasena = md5('next_u');
$correo = 'correo3@correo3.com';
$fecha = '2000/05/04';

try {
    $sql = "INSERT INTO usuario(users, pass,correo,fecha_nac) VALUES('$usuario', '$contrasena','$correo','$fecha')";

    if($conexion->query($sql)===TRUE){
        echo "Usuario 3 Registrado";
    }else{
        echo "Error Insert";
    }
} catch (Exception $e) {
    echo 'exception: ',  $e->getMessage(), "\n";
}

$conexion->close();
?>
