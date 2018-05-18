<?php
 require('conexion.php');

    $idevento = $_POST['id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_h = $_POST['start_hour'];
    $end_h = $_POST['end_hour'];

    $consulta = "UPDATE eventos 
    SET date_ini='$start_date',h_ini='$start_h',date_end='$end_date',h_end='$end_h'
    WHERE id_evento='$idevento'";

    if($conexion->query($consulta)===TRUE){
     $arr['msg']='OK';   
    }else{
     $arr['msg']='ERROR, AL  MOMENTO DE ACTUALIZAR EL EVENTO';
    }
    $myjson = json_encode($arr);
    echo $myjson;
 ?>

 