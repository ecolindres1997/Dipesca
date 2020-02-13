<?php
session_start();
$NombreCient="";
$NombreComun="";
$update =false;
require '../conexion/conexion.php';
if(isset($_POST['save'])){
  $NombreCient= $_POST['NombreCient'];
  $NombreComun= $_POST['NombreComun'];
  $conexion->query("INSERT INTO especie (nombre_cientifico,nombre_comun) VALUES('$NombreCient','$NombreComun')")or die($conexion->error);
      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: agrega_especie.php");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
  $conexion->query("DELETE FROM `especie` WHERE id = $id")or die($conexion->error);
     $_SESSION['message'] = "Registro Eliminado Exitosamente";
      $_SESSION['msg_type'] = "danger";
       header('location: index.php');
}
if (isset($_GET['Info'])) {
  $id = $_GET['Info'];
  $update = true;
$result = $conexion->query("SELECT * from especie") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreCient= $row['nombre_cientifico'];
    $NombreComun= $row['nombre_comun'];
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
$result = $conexion->query("SELECT * from especie") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreCient= $row['nombre_cientifico'];
    $NombreComun= $row['nombre_comun'];

}
if (isset($_POST['update'])){
  $id = $_POST['id'];
 $NombreCient= $_POST['NombreCient'];
  $NombreComun= $_POST['NombreComun'];
  $conexion->query("UPDATE `especie` SET `nombre_cientifico` = '$NombreCient',`nombre_comun` = '$NombreComun' WHERE `especie`.`id` = $id;")
   or  die($conexion->error);
$_SESSION['message'] = "el registro ha sido Actualizado !";
$_SESSION['msg_type'] = "warning";

  header("location: index.php");
}

 ?>
