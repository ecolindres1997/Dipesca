<?php
session_start();
$PRIMER_NOMBRE = "";
$SEGUNDO_NOMBRE = "";
$PRIMER_APELLIDO = "";
$SEGUNDO_APELLIDO = "";
$ID_GENERO="";
$ID_ESTADO="";
$ID_TIPO="";
$EMAIL = "";
$FECHA = "";
$PASSWORD ="";
$TELEFONO ="";
$IDENTIFICACION = "";
$CONCESION ="";
$DOMICILIO ="";
$update =false;
require '../conexion/conexion.php';
if(isset($_POST['save'])){
  $PRIMER_NOMBRE= $_POST['PRIMER_NOMBRE'];
  $SEGUNDO_NOMBRE= $_POST['SEGUNDO_NOMBRE'];
  $PRIMER_APELLIDO= $_POST['PRIMER_APELLIDO'];
  $SEGUNDO_APELLIDO= $_POST['SEGUNDO_APELLIDO'];
  $ID_TIPO= $_POST['ID_TIPO'];
  $ID_GENERO= $_POST['ID_GENERO'];
  $EMAIL= $_POST['EMAIL'];
  $PASSWORD= $_POST['PASSWORD'];
  $TELEFONO= $_POST['TELEFONO'];
  $CONCESION= $_POST['CONCESION'];
  $DOMICILIO= $_POST['DOMICILIO'];
  $IDENTIFICACION= $_POST['IDENTIFICACION'];
  $conexion->query("INSERT INTO usuario (PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO,SEGUNDO_APELLIDO, id_estado, id_tipo, correo_electronico,password,id_genero,telefono_casa,identificacion,Concesion,domicilio) VALUES('$PRIMER_NOMBRE', '$SEGUNDO_NOMBRE', 
    '$PRIMER_APELLIDO', '$SEGUNDO_APELLIDO', '2', '$ID_TIPO','$EMAIL','$PASSWORD','$ID_GENERO',
    '$TELEFONO','$CONCESION','$DOMICILIO','$IDENTIFICACION')")or
    die($conexion->error);
      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: agrega_user.php");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
  $conexion->query("DELETE FROM `usuario` WHERE `usuario`.`id` = $id")or die($conexion->error);
     $_SESSION['message'] = "Registro Eliminado Exitosamente";
      $_SESSION['msg_type'] = "danger";
       header('location: index.php');
}
if (isset($_GET['Info'])) {
  $id = $_GET['Info'];
  $update = true;
$result = $conexion->query("SELECT usuario.primer_nombre, usuario.segundo_nombre,usuario.primer_apellido,usuario.segundo_apellido,tipo.nombre_id ,genero.Nombre_genero, usuario.correo_electronico,usuario.telefono_casa,usuario.Concesion, usuario.domicilio, usuario.identificacion FROM usuario join tipo on usuario.id_tipo = tipo.id 
   join genero on usuario.id_genero = genero.id WHERE usuario.id=$id") or  die($conexion->error);
//if (count($result)==1){
$row = $result->fetch_array();
  $PRIMER_NOMBRE= $row['primer_nombre'];
  $SEGUNDO_NOMBRE= $row['segundo_nombre'];
  $PRIMER_APELLIDO= $row['primer_apellido'];
  $SEGUNDO_APELLIDO= $row['segundo_apellido'];
  $ID_TIPO= $row['nombre_id'];
  $ID_GENERO= $row['Nombre_genero'];
  $EMAIL= $row['correo_electronico'];
  $TELEFONO= $row['telefono_casa'];
  $CONCESION= $row['Concesion'];
  $DOMICILIO= $row['domicilio'];
  $IDENTIFICACION= $row['identificacion'];
}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
$result = $conexion->query("SELECT * FROM usuario join tipo on usuario.id_tipo = tipo.id 
   join genero on usuario.id_genero = genero.id WHERE usuario.id=$id") or  die($conexion->error);;
//if (count($result)==1){
$row = $result->fetch_array();
  $PRIMER_NOMBRE= $row['primer_nombre'];
  $SEGUNDO_NOMBRE= $row['segundo_nombre'];
  $PRIMER_APELLIDO= $row['primer_apellido'];
  $SEGUNDO_APELLIDO= $row['segundo_apellido'];
  $ID_TIPO= $row['nombre_id'];
  $ID_GENERO= $row['Nombre_genero'];
  $EMAIL= $row['correo_electronico'];
  $TELEFONO= $row['telefono_casa'];
  $CONCESION= $row['Concesion'];
  $DOMICILIO= $row['domicilio'];
  $IDENTIFICACION= $row['identificacion'];

//  }

}
if (isset($_POST['update'])){
  $id = $_POST['id'];
  $PRIMER_NOMBRE= $_POST['PRIMER_NOMBRE'];
  $SEGUNDO_NOMBRE= $_POST['SEGUNDO_NOMBRE'];
  $PRIMER_APELLIDO= $_POST['PRIMER_APELLIDO'];
  $SEGUNDO_APELLIDO= $_POST['SEGUNDO_APELLIDO'];
  $ID_TIPO= $_POST['ID_TIPO'];
  $ID_GENERO= $_POST['ID_GENERO'];
  $EMAIL= $_POST['EMAIL'];
  $PASSWORD= $_POST['PASSWORD'];
  $TELEFONO= $_POST['TELEFONO'];
  $CONCESION= $_POST['CONCESION'];
  $DOMICILIO= $_POST['DOMICILIO'];
  $IDENTIFICACION= $_POST['IDENTIFICACION'];


$conexion->query("UPDATE usuario SET PRIMER_NOMBRE ='$PRIMER_NOMBRE', SEGUNDO_NOMBRE='$SEGUNDO_NOMBRE', PRIMER_APELLIDO ='$PRIMER_APELLIDO', SEGUNDO_APELLIDO='$SEGUNDO_APELLIDO', correo_electronico='$EMAIL', ID_TIPO = '$ID_TIPO' WHERE id=$id") or  die($conexion->error);;
$_SESSION['message'] = "el registro ha sido Actualizado !";
$_SESSION['msg_type'] = "warning";

  header("location: index.php");
}

 ?>
