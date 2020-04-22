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
  $query = "UPDATE pacientes SET rut = '$rut', nombre = '$nombre',
             apellido = '$apellido', doctor = '$doctor', remedios = '$remedios', 
            problemas = '$problemas', Numero = '$numero', Direccion = '$direccion' WHERE rut = '$rut'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
    echo 0;  
  }

  echo 1;  

}
?>