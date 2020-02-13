<?php
session_start();
$CONTENEDOR_NO="";
$ID_USUARIO="";
$ID_CERTIFICADO = "";
$filename ="";
$update =false;
require '../conexion/conexion.php';
if(isset($_POST['save'])){
  $CONTENEDOR_NO= $_POST['CONTENEDOR_NO'];
  $usuarioId= $_POST['usuarioId'];
  $ID_CERTIFICADO= $_POST['ID_CERTIFICADO'];
  $filename = $_FILES['myfile']['name'];
  $destination = 'subidas/' . $filename;
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  $file = $_FILES['myfile']['tmp_name'];
  $size = $_FILES['myfile']['size'];
  if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
       if (move_uploaded_file($file, $destination)) {
  $conexion->query("INSERT INTO anexo4 (contenedor_numero, id_usuario, id_certificado,name, size, downloads) 
    VALUES('$CONTENEDOR_NO', '$usuarioId','$ID_CERTIFICADO', '$filename', $size, 0)")or die($conexion->error);

      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: nuevo_anexo.php");
      }
    }
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
$result = $conexion->query("SELECT * FROM usuario join tipo on usuario.id_tipo = tipo.id 
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
