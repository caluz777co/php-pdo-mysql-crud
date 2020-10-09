<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- mensajes -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- Añadir nueva tarea -->
      <div class="card card-body">
        <form action="save_class.php" method="POST">
          <div class="form-group">
            <input type="text" name="asignatura" class="form-control" placeholder="Asignatura" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="profesor" class="form-control" placeholder="Profesor">
          </div>
          <div class="form-group">
            <input type="text" name="link_zoom" class="form-control" placeholder="Link Zoom">
          </div>
          <input type="submit" name="save_class" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Asignatura</th>
            <th>Profesor</th>
            <th>Link Zoom</th>
            <th>Creado</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM clases";
          $result_class = $objetoPDO->query($query);    

          while($row = $result_class->fetch()) { ?>
          <tr>
            <td><?php echo $row['asignatura']; ?></td>
            <td><?php echo $row['profesor']; ?></td>
            <td><?php echo $row['link_zoom']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_class.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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

<?php include('includes/footer.php'); ?>
