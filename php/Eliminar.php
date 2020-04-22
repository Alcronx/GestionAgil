<?php

  include('Conexion.php');

  $rut = $_POST['rutt'];

  include('conexion.php');

  $query = "DELETE from pacientes where rut = '$rut'";
  $result = mysqli_query($connection, $query);
  if(!$result) 
  {
    echo 0;
  }else
  {
    echo 1;
  }


?>