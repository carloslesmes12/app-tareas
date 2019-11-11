  
   <?php

    include_once("conexion.php");

    if (isset($_POST['name'])) {

        $nombre = $_POST['name'];
        $descripcion = $_POST['description'];

        $query = "INSERT  into tareas(name,descripcion) VALUES ('$nombre','$descripcion')";
        $resultado = mysqli_query($conexion, $query);

        if (!$resultado) {
            die('Query,Fallo');
        }

        echo 'Tarea agregada satisfactoriamente';
    }


    ?>