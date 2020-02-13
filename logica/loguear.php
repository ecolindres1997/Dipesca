<?php 
$conexion = new mysqli("127.0.0.1","root","","dipesca");

if(!$conexion)
{
	echo "no conecto";
}

session_start();
 	if(isset($_POST['entrar'])){
 		# code...

  $EMAIL = $_POST['EMAIL'];
  $PASSWORD = $_POST['PASSWORD'];

  $SQL	 = "SELECT * FROM usuario WHERE correo_electronico = '$EMAIL' and password = '$PASSWORD'";
  $CONSULTA = mysqli_query($conexion,$SQL);
  $array = mysqli_fetch_array($CONSULTA);
  
 
   if ($array ['id_tipo'] == 1) {
  	$_SESSION['correo_electronico'] = $EMAIL;
  	header("location: ../");

  }elseif ($array ['id_tipo'] == 2) {
  		$_SESSION['correo_electronico'] = $EMAIL;
	  	header("location: ../usuarios");

  }elseif ($array ['correo_electronico']!=$EMAIL && $array ['password']!=$PASSWORD){
    		
  			$_SESSION['message'] = "CORREO ELECTRONICO O CONTRASEÑA INCORRECTO";
 			$_SESSION['msg_type'] = "warning";
  			header("location: ../login.php");

  }
} ?>