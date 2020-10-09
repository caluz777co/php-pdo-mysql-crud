<?php
include("db.php");
$asignatura = '';
$profesor = '';
$link_zoom ='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM clases WHERE id=$id";
  $result = $objetoPDO->query($query);
  if ($result) {
    $row = $result->fetch();
    $asignatura = $row['asignatura'];
    $profesor = $row['profesor'];
    $link_zoom = $row['link_zoom'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $asignatura= $_POST['asignatura'];
  $profesor = $_POST['profesor'];
  $link_zoom = $_POST['link_zoom'];

  $query = "UPDATE clases set asignatura = '$asignatura', profesor = '$profesor', link_zoom = '$link_zoom' WHERE id=$id";
  $objetoPDO->exec($query);
  
  $_SESSION['message'] = 'La clase se actualizo con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="asignatura" type="text" class="form-control" value="<?php echo $asignatura; ?>" placeholder="Actualizar Asignatura">
        </div>
        <div class="form-group">
          <input name="profesor" class="form-control" value="<?php echo $profesor;?>" placeholder="Actualizar Profesor">
        </div>
        <div class="form-group">
          <input name="link_zoom" class="form-control" value="<?php echo $link_zoom;?>" placeholder="Actualizar Link Zoom"> 
        </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
