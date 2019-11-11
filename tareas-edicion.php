

<?php

    include_once('conexion.php');

       $nombre = $_POST['name'];
      $descripcion =$_POST['description'];
      $id=$_POST['id'];


     $query = " UPDATE tareas  SET name = '$nombre', descripcion = '$descripcion' where  idTabla='$id' ";

      $resultado = mysqli_query($conexion,$query);

      if (!$resultado){

          die( "Query, Fallo");
      }
      
   
           echo "Tarea modificada satisfactoriamente";

?>