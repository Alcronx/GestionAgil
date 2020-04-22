<?php

include('Conexion.php');

if(isset($_POST['rut'])) {
  $rut = mysqli_real_escape_string($connection, $_POST['id']);

  $query = "SELECT * from pacientes WHERE rut = {$rut}";

  $result = mysqli_query($connection, $query);
  if(!result) {
    die('Fallo En la query'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'rut' => $row['rut'],
        'nombre' => $row['nombre'],
        'apellido' => $row['apellido'],
        'direccion' => $row['direccion'],
        'doctor' => $row['doctor'],
        'remedios' => $row['remedios'],
        'problemas' => $row['problemas'],
        'Numero' => $row['Numero']
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}

?>