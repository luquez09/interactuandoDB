<?php
$servidor = 'localhost';
$username = 'root';
$password = '';
$basedatos = 'agenda';

$conexion = new mysqli($servidor, $username, $password, $basedatos);

if ($conexion->connect_error) {
   die($conexion->connect_error);
}

?>