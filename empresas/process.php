<?php
session_start();
$NombreEmp="";
$Nit="";
$Email ="";
$update =false;
require '../conexion/conexion.php';
if(isset($_POST['save'])){
  $NombreEmp= $_POST['NombreEmp'];
  $Nit= $_POST['Nit'];
  $Email= $_POST['Email'];
  $conexion->query("INSERT INTO empresa (nombre, nit,email) VALUES('$NombreEmp','$Nit','$Email')")or die($conexion->error);
      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: agrega_empresa.php");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
  $conexion->query("DELETE FROM `empresa` WHERE id = $id")or die($conexion->error);
     $_SESSION['message'] = "Registro Eliminado Exitosamente";
      $_SESSION['msg_type'] = "danger";
       header('location: index.php');
}
if (isset($_GET['Info'])) {
  $id = $_GET['Info'];
  $update = true;
$result = $conexion->query("SELECT * from empresa") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreEmp= $row['nombre'];
  $Nit= $row['nit'];
  $Email= $row['email'];
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
$result = $conexion->query("SELECT * from empresa") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreEmp= $row['nombre'];
  $Nit= $row['nit'];
  $Email= $row['email'];
//  }

}
if (isset($_POST['update'])){
  $id = $_POST['id'];
  $NombreEmp= $_POST['NombreEmp'];
  $Nit= $_POST['Nit'];
  $Email= $_POST['Email'];
$conexion->query("UPDATE `empresa` SET `nombre` = '$NombreEmp', `nit` = '$Nit',
 `email` = '$Email' WHERE `empresa`.`id` = $id;") or  die($conexion->error);;
$_SESSION['message'] = "el registro ha sido Actualizado !";
$_SESSION['msg_type'] = "warning";

  header("location: index.php");
}

 ?>
