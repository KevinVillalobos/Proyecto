<?php include ("config.php") ?>
<?php include ("includes/header.php") ?>
<main class="container p-4">
  <div class="row">
    <div class="col-md-4">


      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      
      <div class="card card-body">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="Nombre" class="form-control" placeholder="Nombre" >
          </div>
          <div class="form-group">
            <textarea name="Apellido" rows="2" class="form-control" placeholder="Apellido"></textarea>
          </div>
          <div class="Numero">
            <textarea name="Numero" rows="2" class="form-control" placeholder="Numero"></textarea>
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
            <th>Numero</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $query = "SELECT * FROM users";
          $result_users= mysqli_query($link, $query);
          while($row = mysqli_fetch_assoc($result_users)) { ?>
          <tr>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellido']; ?></td>
            <td><?php echo $row['Numero']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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

        
