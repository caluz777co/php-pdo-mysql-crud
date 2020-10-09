<?php
  session_start();
  
  $usuario = 'carlos'; //change user
  $contraseña='password'; // change password
  try{
    $objetoPDO = new PDO('mysql:host=localhost;dbname=php_mysql_crud', $usuario, $contraseña);
    $objetoPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
  }
?>
