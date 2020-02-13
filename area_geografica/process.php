<?php
session_start();
$NombreArea="";
$update =false;
require '../conexion/conexion.php';
if(isset($_POST['save'])){
  $NombreArea= $_POST['NombreArea'];
  $conexion->query("INSERT INTO litoral (nombre_litoral) VALUES('$NombreArea')")or die($conexion->error);
      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: agrega_arte.php");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
  $conexion->query("DELETE FROM `litoral` WHERE id = $id")or die($conexion->error);
     $_SESSION['message'] = "Registro Eliminado Exitosamente";
      $_SESSION['msg_type'] = "danger";
       header('location: index.php');
}
if (isset($_GET['Info'])) {
  $id = $_GET['Info'];
  $update = true;
$result = $conexion->query("SELECT * from litoral WHERE `litoral`.`id` = $id;") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreArea= $row['nombre_litoral'];
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
$result = $conexion->query("SELECT * from litoral WHERE `litoral`.`id` = $id;") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreArea= $row['nombre_litoral'];
}
if (isset($_POST['update'])){
  $id = $_POST['id'];
  $NombreArea= $_POST['NombreArea'];
$conexion->query("UPDATE `litoral` SET `nombre_litoral` = '$NombreArea' WHERE `litoral`.`id` = $id;") or  die($conexion->error);;
$_SESSION['message'] = "el registro ha sido Actualizado !";
$_SESSION['msg_type'] = "warning";

  header("location: index.php");
}

 ?>
