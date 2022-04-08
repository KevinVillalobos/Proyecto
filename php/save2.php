<?php

include('config.php');

if (isset($_POST['save'])); {
  $Nombre = $_POST['Nombre'];
  $Apellido = $_POST['Apellido'];
  $Edad = $_POST['Edad'];
  $Tipo = $_POST['Tipo'];
  echo $Nombre;
  echo $Apellido;
  echo $Edad;
  echo $Tipo;
  $query = "INSERT INTO membresias(Nombre,Apellido,Edad,Tipo) VALUES ('$Nombre','$Apellido','$Edad','$Tipo')";
  $result = mysqli_query($link, $query);
  if(!$result) {
    die("Consulta Fallida.");
  }
  $_SESSION['message'] = 'Cliente registrado de manera correcta';
  $_SESSION['message_type'] = 'Exito';
  header('Location: membresias.php');

}

?>
