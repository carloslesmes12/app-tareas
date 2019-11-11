  

  <?php

    include_once('conexion.php');


    $query = "SELECT * from tareas";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die('Query Fallo ' . mysqli_error($conexion));
    }

    $json = array();
    while ($row = mysqli_fetch_array($resultado)) {

        $json[] = array(

            'name' => $row['name'],
            'descripcion' => $row['descripcion'],
            'id' => $row['idTabla']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;

    ?>
 