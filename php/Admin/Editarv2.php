<?php

  include('Conexion2.php');

if(isset($_POST['Nombre'])) {
  $id = $_POST['id'];
  $Nombre = $_POST['Nombre'];;
  $Contraseña = $_POST['Contraseña'];
  $IdRol = $_POST['IdRol'];
  $query = "UPDATE usuarios SET Nombre = '$Nombre', Contraseña = '$Contraseña' , id='$IdRol'
            WHERE usuarios.id = '$id'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
    echo 0;  
  }

  echo 1;  

}
?>