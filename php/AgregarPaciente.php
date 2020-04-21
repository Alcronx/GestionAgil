<?php

  include('Conexion.php');

if(isset($_POST['rut'])) {
  $rut = $_POST['rut'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $doctor = $_POST['doctor'];
  $remedios = $_POST['remedios'];
  $problemas = $_POST['problemas'];
  $numero = $_POST['numero'];
  $query = "INSERT into pacientes(rut,nombre,apellido,direccion,doctor,remedios,problemas,Numero)
   VALUES ('$rut','$nombre','$apellido','$direccion','$doctor','$remedios','$problemas','$numero')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
    echo 0;  
  }

  echo 1;  

}

?>