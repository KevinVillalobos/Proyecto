<?php
include("config.php");
$Nombre = '';
$Apellido= '';
$Edad= '';
$Tipo= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM membresias WHERE id=$id";
  $result = mysqli_query($link, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Apellido = $row['Apellido'];
    $Edad = $row['Edad'];
    $Tipo = $row['Tipo'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $Nombre= $_POST['Nombre'];
  $Apellido = $_POST['Apellido'];
  $Edad = $_POST['Edad'];
  $Tipo = $_POST['Tipo'];

  $query = "UPDATE membresias set Nombre = '$Nombre', Apellido = '$Apellido',Edad = '$Edad',Tipo = '$Tipo' WHERE id=$id";
  mysqli_query($link, $query);
  $_SESSION['message'] = 'Usuario actualizado correctamente';
  $_SESSION['message_type'] = 'warning';
  header("Location: membresias.php");
}

?>
<?php include('includes/header2.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit2.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Actualizar datos">
        </div>
        <div class="form-group">
        <textarea name="Apellido" class="form-control" cols="1" rows="1"><?php echo $Apellido;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Edad" class="form-control" cols="2" rows="1"><?php echo $Edad;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Tipo" class="form-control" cols="2" rows="1"><?php echo $Tipo;?></textarea>
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
