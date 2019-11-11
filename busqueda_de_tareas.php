

<?php

include_once('conexion.php');

$buascar = $_POST['search'];

if (!empty($buascar)) {

  $query = "SELECT * FROM tareas where  name  LIKE '$buascar%'";
  $resultado = mysqli_query($conexion, $query);
  if (!$resultado) {
    die('Query Error' . mysqli_error($conexion));
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
}

?>


