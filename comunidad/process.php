<?php
session_start();
$NombreComunidad="";
$IdAgeo="";
$update =false;
require '../conexion/conexion.php';
if(isset($_POST['save'])){
  $NombreComunidad= $_POST['NombreComunidad'];
    $IdAgeo= $_POST['IdAgeo'];
  $conexion->query("INSERT INTO lugar_pesca (nombre_lugar,id_litoral) VALUES('$NombreComunidad', '$IdAgeo')")
  or die($conexion->error);
      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: agrega_comunidad.php");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
  $conexion->query("DELETE FROM `lugar_pesca` WHERE id = $id")or die($conexion->error);
     $_SESSION['message'] = "Registro Eliminado Exitosamente";
      $_SESSION['msg_type'] = "danger";
       header('location: index.php');
}
if (isset($_GET['Info'])) {
  $id = $_GET['Info'];
  $update = true;
$result = $conexion->query("SELECT * from lugar_pesca join litoral on litoral.id = lugar_pesca.id_litoral WHERE `lugar_pesca`.`id` = $id;") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreComunidad= $row['nombre_lugar'];
  $IdAgeo= $row['nombre_litoral'];
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
$result = $conexion->query("SELECT * from lugar_pesca join litoral on litoral.id = lugar_pesca.id_litoral WHERE `lugar_pesca`.`id` = $id;") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreComunidad= $row['nombre_lugar'];
  $IdAgeo= $row['nombre_litoral'];
}
if (isset($_POST['update'])){
  $id = $_POST['id'];
  $NombreComunidad= $_POST['NombreComunidad'];
$conexion->query("UPDATE `lugar_pesca` SET `nombre_lugar` = '$NombreComunidad' WHERE `lugar_pesca`.`id` = $id;") or  die($conexion->error);;
$_SESSION['message'] = "el registro ha sido Actualizado !";
$_SESSION['msg_type'] = "warning";

  header("location: index.php");
}

 ?>
