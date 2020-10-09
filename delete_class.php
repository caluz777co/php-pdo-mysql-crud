<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM clases WHERE id = $id";
  //Ejecutamos la consulta
  $result = $objetoPDO->exec($query);
  if(!$result) {
    die("Fallo Consulta.");
  }

  $_SESSION['message'] = 'La clase se a eliminado con exito';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
