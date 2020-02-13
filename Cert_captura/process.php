<?php
session_start();
$FechaV="";
$Certificado="";
$ID_Embarca = "";
$ID_Empresa ="";
$codigo_certificado="";
$Disponible ="";
$Id_cert ="";
$Id_especie ="";
$update =false;
require '../conexion/conexion.php';
if(isset($_POST['save'])){
  $FechaV= $_POST['FechaV'];
  $codigo_certificado= $_POST['codigo_certificado'];
  $PesoDes= $_POST['PesoDes'];
  $PesoIn= $_POST['PesoIn'];
  $ID_Embarca= $_POST['ID_Embarca'];
  $ID_Empresa= $_POST['ID_Empresa'];
  $Disponible= $_POST['Disponible'];
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
  $conexion->query("INSERT INTO certificado_captura (fecha_validacion, codigo_certificado, peso_total_desemb,peso_ingreso_planta,id_embarcacion,id_empresa,name, size, downloads,Disponible) 
    VALUES('$FechaV', '$codigo_certificado','$PesoDes','$PesoIn','$ID_Embarca', '$ID_Empresa','$filename', '$size', 0,'$Disponible')")or die($conexion->error);

      $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: nuevo_cert.php");
      }
    }
}

if (isset($_POST['save_detalle'])) {
  $Id_cert= $_POST['Id_cert'];
  $Id_especie= $_POST['Id_especie'];
  $Disponible= $_POST['Disponible'];
    $Asignado= $_POST['Asignado'];
  $conexion->query("INSERT INTO detalle_cert (ID_CERTIFICADO, ID_ESPECIE, Disponible,Cant_asignada) 
    VALUES( '$Id_cert','$Id_especie','$Disponible','$Asignado')")or die($conexion->error);

    $conexion->query("  UPDATE certificado_captura JOIN detalle_cert on certificado_captura.id = detalle_cert.ID_CERTIFICADO SET certificado_captura.Disponible = certificado_captura.Disponible - $Asignado   WHERE certificado_captura.id = $Id_cert") or  die($conexion->error);
        $_SESSION['message'] = "Registro Guardado Exitosamente";
      $_SESSION['msg_type'] = "success";
        header("location: nuevo_cert.php");
}

         



if(isset($_GET['delete'])){
    $id = $_GET['delete'];
  $conexion->query("DELETE FROM `certificado_captura` WHERE `certificado_captura`.`id` = $id")or die($conexion->error);
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
