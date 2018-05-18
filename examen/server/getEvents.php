<?php
    require('conexion.php');
    session_start();

    $id = $_SESSION['id'];

    $consulta = "SELECT id_evento,titulo,date_ini,h_ini,date_end,h_end,dia_c
    FROM eventos 
    WHERE id_usuario = '$id'";
    $arr=[];
    $result = $conexion->query($consulta);

    if($result->num_rows > 0){
        $pos = 0;
        while($row = $result->fetch_assoc()){
           $arr[$pos] = array('id'=>$row['id_evento'], 'title'=>$row["titulo"], 'start'=>$row["date_ini"], 'end'=>$row["date_end"]);
           $pos++;
        }
        $data['msg'] = "OK";
        $data['eventos'] = $arr;
    }else{
       $data['msg'] = 'Sin Eventos';
    }
    $myjson = json_encode($data);
    echo $myjson;
 ?>
