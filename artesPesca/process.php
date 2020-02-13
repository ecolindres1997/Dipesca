<?php
session_start();
$NombreArte="";
$update =false;
require '../conexion/conexion.php';
if(isset($_POST['save'])){
  $NombreArte= $_POST['NombreArte'];
  $conexion->query("INSERT INTO arte_pesca (nombre_arte) VALUES('$NombreArte')")or die($conexion->error);
      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: agrega_arte.php");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
  $conexion->query("DELETE FROM `arte_pesca` WHERE id = $id")or die($conexion->error);
     $_SESSION['message'] = "Registro Eliminado Exitosamente";
      $_SESSION['msg_type'] = "danger";
       header('location: index.php');
}
if (isset($_GET['Info'])) {
  $id = $_GET['Info'];
  $update = true;
$result = $conexion->query("SELECT * from arte_pesca") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreArte= $row['nombre_arte'];
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
$result = $conexion->query("SELECT * from arte_pesca") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreArte= $row['nombre_arte'];
}
if (isset($_POST['update'])){
  $id = $_POST['id'];
  $NombreArte= $_POST['NombreArte'];
$conexion->query("UPDATE `arte_pesca` SET `nombre` = '$NombreArte' WHERE `arte_pesca`.`id` = $id;") or  die($conexion->error);;
$_SESSION['message'] = "el registro ha sido Actualizado !";
$_SESSION['msg_type'] = "warning";

  header("location: index.php");
}

 ?>
