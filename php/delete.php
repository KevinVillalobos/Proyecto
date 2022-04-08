<?php

include("config.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM users WHERE id = $id";
  $result = mysqli_query($link, $query);
  if(!$result) {
    die("Intento Fallido.");
  }

  $_SESSION['message'] = 'Usuario exiliado correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
