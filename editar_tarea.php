<?php

  include_once('conexion.php');

  $id=$_POST['id'];

  $query="SELECT * FROM  tareas  WHERE  idTabla= $id";

    $resultado = mysqli_query($conexion,$query);
   
     if (!$resultado){

        die('QUERY, fallido');
     }


    $json= array();
    while ($row = mysqli_fetch_array($resultado)){
   
             $json[]= array(
                         
                'name' => $row['name'],
                'descripcion' => $row['descripcion'],
                'id' => $row['idTabla']

             );
    }

             $jsonstring = json_encode( $json[0]);
             echo $jsonstring;

?>