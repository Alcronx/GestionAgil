<?php

  include('Conexion2.php');

if(isset($_POST['Usuario'])) {
  $Usuario = $_POST['Usuario'];
  $Contraseña = $_POST['Contraseña'];
  $Rol = $_POST['Rol'];
  $query = "INSERT INTO usuarios(Nombre,Contraseña,id_rol) 
  VALUES ('$Usuario','$Contraseña','$Rol')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    echo 0;  
  }

  if ($result) {
    echo 1;  
  }

}

?>