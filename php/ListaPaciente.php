<?php

  include('conexion.php');

  $query = "SELECT * from pacientes";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Error En la query'. mysqli_error($connection));
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
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>