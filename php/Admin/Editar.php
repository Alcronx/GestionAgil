<?php

  include('Conexion2.php');
  $rut = $_POST['rutt'];
  $query = "SELECT * FROM usuarios where id = '$rut'";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Error En la query'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'id' => $row['id'],
      'Nombre' => $row['Nombre'],
      'Contraseña' => $row['Contraseña'],
      'idRol' => $row['id_rol']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>