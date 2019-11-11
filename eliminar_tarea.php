<?php


     include_once ('conexion.php');


       

     if(isset($_POST['id'])){

               $id = $_POST['id'];              
          
        $qury= "DELETE FROM tareas  where idTabla=$id";
           
        $resultado  = mysqli_query($conexion,$qury);

        if(!$resultado){

                die('Query fallo.');

        }

       echo "tarea eliminada satisfatoriamente";

     };




?>