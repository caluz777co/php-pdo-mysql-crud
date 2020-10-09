<?php

include('db.php');

if (isset($_POST['save_class'])) {
  $asignatura = $_POST['asignatura'];
  $profesor = $_POST['profesor'];
  $link_zoom = $_POST['link_zoom'];
  $query = "INSERT INTO clases(asignatura, profesor, link_zoom) VALUES ('$asignatura', '$profesor', '$link_zoom')";
  $result = $objetoPDO->query($query);
  if(!$result) {
    die("Consulta Fallo.");
  }

  $_SESSION['message'] = 'La clase se a guardado con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
