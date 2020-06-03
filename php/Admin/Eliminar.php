<?php

  include('Conexion2.php');

  $rut = $_POST['rutt'];

  $query = "DELETE from usuarios where id = '$rut'";
  $result = mysqli_query($connection, $query);
  if(!$result) 
  {
    echo 0;
  }else
  {
    echo 1;
  }


?>