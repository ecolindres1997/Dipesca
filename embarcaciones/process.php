<?php
session_start();
$TipoEmb ="";
$NombreEmb="";
$Modelo="";
$Bandera ="";
$NameTipo="";
$update =false;
require '../conexion/conexion.php';
if(isset($_POST['save'])){
  $NombreEmb= $_POST['NombreEmb'];
  $TipoEmb= $_POST['TipoEmb'];
  $Modelo= $_POST['Modelo'];
  $Bandera= $_POST['Bandera'];
  $conexion->query("INSERT INTO embarcacion (nombre_embarcacion, modelo,bandera,id_tipo) VALUES('$NombreEmb','$Modelo','$Bandera','$TipoEmb')")or die($conexion->error);
      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: agrega_embarca.php");
}
if(isset($_POST['save_tipo'])){
  $NameTipo= $_POST['NameTipo'];

  $conexion->query("INSERT INTO tipo_embarcacion (nombre_tipo) VALUES('$NameTipo')")or die($conexion->error);
      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: agrega_embarca.php");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
  $conexion->query("DELETE FROM `embarcacion` WHERE id = $id")or die($conexion->error);
     $_SESSION['message'] = "Registro Eliminado Exitosamente";
      $_SESSION['msg_type'] = "danger";
       header('location: index.php');
}
if (isset($_GET['Info'])) {
  $id = $_GET['Info'];
  $update = true;
$result = $conexion->query("SELECT embarcacion.id,embarcacion.nombre_embarcacion, embarcacion.modelo, embarcacion.bandera,tipo_embarcacion.nombre_tipo from embarcacion  join tipo_embarcacion on embarcacion.id_tipo = tipo_embarcacion.id") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreEmb= $row['nombre_embarcacion'];
  $TipoEmb= $row['nombre_tipo'];
  $Modelo= $row['modelo'];
  $Bandera= $row['bandera'];
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
$result = $conexion->query("SELECT embarcacion.id,embarcacion.nombre_embarcacion, embarcacion.modelo, embarcacion.bandera,tipo_embarcacion.nombre_tipo from embarcacion  join tipo_embarcacion on embarcacion.id_tipo = tipo_embarcacion.id") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $NombreEmb= $row['nombre_embarcacion'];
  $TipoEmb= $row['nombre_tipo'];
  $Modelo= $row['modelo'];
  $Bandera= $row['bandera'];

//  }

}
if (isset($_POST['update'])){
  $id = $_POST['id'];
  $NombreEmb= $_POST['NombreEmb'];
  $TipoEmb= $_POST['TipoEmb'];
  $Modelo= $_POST['Modelo'];
  $Bandera= $_POST['Bandera'];


$conexion->query("UPDATE `embarcacion` SET `nombre_embarcacion` = '$NombreEmb', `modelo` = '$Modelo',
 `bandera` = '$Bandera' ,`id_tipo` = '$TipoEmb'WHERE `embarcacion`.`id` = $id;") or  die($conexion->error);;
$_SESSION['message'] = "el registro ha sido Actualizado !";
$_SESSION['msg_type'] = "warning";

  header("location: index.php");
}

 ?>
