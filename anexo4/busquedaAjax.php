<?php 

require "../conexion/conexion.php";

//var_dump(@$_GET);

switch(@$_GET['op']){
	case 'getSearch':
		$busqueda = @$_GET['dato'];
		//$result = mysqli_query($conexion, "SELECT * from usuario WHERE primer_nombre like '%$busqueda%'");
		$result = $conexion->query("SELECT * from usuario WHERE primer_nombre like '%$busqueda%'") or  die($conexion->error);;
		//if (count($result)==1){
		//$row = $result->fetch_array();

		echo json_encode($result -> fetch_all(MYSQLI_ASSOC));
	break;
}
?>
