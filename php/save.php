<?php

include('config.php');

if (isset($_POST['save']))
echo "saving"; {
  $Nombre = $_POST['Nombre'];
  $Apellido = $_POST['Apellido'];
  $Numero = $_POST['Numero'];
  echo $Nombre;
  echo $Apellido;
  echo $Numero;
  $query = "INSERT INTO users(Nombre, Apellido,Numero) VALUES ('$Nombre', '$Apellido','$Numero')";
  $result = mysqli_query($link, $query);
  if(!$result) {
    die("Consulta Fallida.");
  }

  $_SESSION['message'] = 'Empleado registrado de manera correcta';
  $_SESSION['message_type'] = 'Exito';
  header('Location: index.php');

}

?>
