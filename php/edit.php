<?php
include("config.php");
$Nombre = '';
$Apellido= '';
$Numero= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM users WHERE id=$id";
  $result = mysqli_query($link, $query);
  if (mysqli_num_rows($result) == true) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Apellido = $row['Apellido'];
    $Numero = $row['Numero'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $Nombre= $_POST['Nombre'];
  $Apellido = $_POST['Apellido'];
  $Numero = $_POST['Numero'];

  $query = "UPDATE users set Nombre = '$Nombre', Apellido = '$Apellido',Numero = '$Numero' WHERE id=$id";
  mysqli_query($link, $query);
  $_SESSION['message'] = 'Usuario actualizado correctamente';
  $_SESSION['message_type'] = 'warning';
  header("Location: index.php");
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Actualizar datos">
        </div>
        <div class="form-group">
        <textarea name="Apellido" class="form-control" cols="1" rows="1"><?php echo $Apellido;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Numero" class="form-control" cols="2" rows="1"><?php echo $Numero;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php 
