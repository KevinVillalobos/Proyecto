<?php include ("config.php") ?>
<?php include ("includes/header2.php") ?>
<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSIONN['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      
      <div class="card card-body">
        <form action="save2.php" method="POST">
          <div class="form-group">
            <input type="text" name="Nombre" class="form-control" placeholder="Nombre">
          </div>
          <div class="form-group">
            <textarea name="Apellido" rows="2" class="form-control" placeholder="Apellido"></textarea>
          </div>
          <div class="Edad">
            <textarea name="Edad" rows="2" class="form-control" placeholder="Edad"></textarea>
          </div>
          <div class="Tipo">
            <textarea name="Tipo" rows="2" class="form-control" placeholder="Tipo"></textarea>
          </div>
          <input type="submit" name="Guardar info" class="btn btn-success btn-block" value="Guardar info">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Tipo</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          
        <?php
          $query = "SELECT * FROM membresias";
          $result_membresia = mysqli_query($link, $query);    
          while($row = mysqli_fetch_assoc($result_membresia)) { ?>
          <tr>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellido']; ?></td>
            <td><?php echo $row['Edad']; ?></td>
            <td><?php echo $row['Tipo']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
            <td>
              <a href="edit2.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete2.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

        
