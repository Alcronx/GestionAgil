<?php

  include('Conexion2.php');

  $query = "SELECT * FROM usuarios";
  $result = mysqli_query($connection,$query);
  if(!$result) {
    die('Error En la query'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'IdUsuario' =>$row['id'],
      'Usuario' => $row['Nombre'],
      'Contraseña' => $row['Contraseña'],
      'Rol' => $row['id_rol']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>