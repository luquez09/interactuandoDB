<?php
  require('conexion.php');
  session_start();
  $id = $_SESSION['id'];

  $arr = [];

  $titulo    = $_POST['titulo'];
  $start     = $_POST['start_date'];
  $allday    = $_POST['allDay'];
  $endDate   = $_POST['end_date'];
  $endHora   = $_POST['end_hour'];
  $startHora = $_POST['start_hour'];

    if($titulo != "" && $start != "" && $allday != "" ){

        $consulta = "INSERT INTO eventos(titulo,date_ini,h_ini,date_end,h_end,dia_c,id_usuario) 
        VALUES('$titulo','$start','$startHora','$endDate','$endHora','$allday','$id')";

        if($conexion->query($consulta)===TRUE){
            $arr['msg']='OK';
        }else{
            $arr['msg']='ERROR, AL INSERTAR EL EVENTO';
        }
    }else{
        $arr['msg']='ERROR, LLENE TODOS LOS CAMPOS REQUERIDOS';
    }

    $myjson = json_encode($arr);
    echo $myjson;
 ?>
