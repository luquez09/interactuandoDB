<?php
    require('conexion.php');

    $idevento = $_POST['id'];

    $arr=[];
    $consulta = "DELETE FROM eventos WHERE id_evento = '$idevento'";
    if($conexion->query($consulta)===TRUE){
        $arr['msg']='OK';
    }else{
        $arr['msg']='ERROR, AL  MOMENTO DE ELIMINAR EL EVENTO';
    }
    $myjson = json_encode($arr);
    echo $myjson;
 ?>
