
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylsheet" type="text/css" href="..CSS/style.css">
        <title>Inicio</title>
         <link href="../maga.ico" rel="icon" type="image/png" />
  </head>
  <body>
    <?php require_once 'process.php'; ?>

    <div class="pos-f-t">
  <div class="collapse navbar-expand-lg navbar-light bg-light" id="navbarToggleExternalContent" >
    <div class="bg-dark p-4">
      <h4 class="text-white">CATALOGOS</h4>
      <a class="navbar-brand text-white" href="../">INICIO</a>
      <a class="navbar-brand text-white" href="../usuarios/">USUARIOS</a>

      <a class="navbar-brand text-white" href="#">Areas Geograficas</a>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
<div class="container">
<div class="text-nowrap bd-highlight" style="width: 8rem;">
<p class="font-weight-bolder">Certificados de captura</p>
</div>
<?php
 
    $EMAIL = $_SESSION['correo_electronico'];
if (!isset($EMAIL)) {
 header('location: ../index.php');
}else {
  echo "         $EMAIL";
}

?>

<?php
          if(isset($_SESSION['message'])): ?>
          <div class="alert alert-<?=$_SESSION['msg_type']?>">

          <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
               ?>
        </div>
        <?php endif?>


    <?php function pre_r( $array ){
         print_r( $array );
         echo '</pre>';
       } ?>
</div>

<div class="container table-responsive">
<?php
// connect to database

// define how many results you want per page
$results_per_page = 5;

// find out the number of results stored in database
$sql='SELECT certificado_captura.id,certificado_captura.fecha_sistema,certificado_captura.fecha_validacion,certificado_captura.codigo_certificado,certificado_captura.Disponible,embarcacion.nombre_embarcacion, empresa.nombre,certificado_captura.name FROM  certificado_captura join embarcacion on certificado_captura.id_embarcacion = embarcacion.id join empresa on certificado_captura.id_empresa = empresa.id';
$result = mysqli_query($conexion, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sql='SELECT certificado_captura.id,certificado_captura.fecha_sistema,certificado_captura.fecha_validacion,certificado_captura.codigo_certificado,certificado_captura.peso_ingreso_planta,embarcacion.nombre_embarcacion, empresa.nombre,certificado_captura.name FROM  certificado_captura join embarcacion on certificado_captura.id_embarcacion = embarcacion.id join empresa on certificado_captura.id_empresa = empresa.id LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conexion, $sql);?>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fecha validacion</th>
      <th scope="col">fecha ingreso</th>
      <th scope="col">codigo_certificado</th>
      <th scope="col">Ingreso a planta</th>
      <th scope="col">embarcacion</th>
      <th scope="col">empresa</th>
      <th scope="col">nombre archivo</th>
      <th scope="col">Adjunto</th>
         <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>

<?php
    while ($row = $result->fetch_assoc()):  ?>
    <tr>
        <td><a href="Busca.php?Info=<?php echo $row ['id']; ?>"><?php  echo $row['id']; ?></td>
                    <td><?php  echo $row['fecha_validacion']; ?></td>
                    <td><?php  echo $row['fecha_sistema']; ?></td>
                    <td><?php  echo $row['codigo_certificado']; ?></td>
                    <td><?php  echo $row['peso_ingreso_planta']; ?></td>
                    <td><?php  echo $row['nombre_embarcacion']; ?></td>
                    <td><?php  echo $row['nombre']; ?></td>
                    <td><?php  echo $row['name']; ?></td>
                     <td><a href="download.php?file_id=<?php echo $row ['id']; ?>" ><img height="50px" src="https://icons.iconarchive.com/icons/graphicloads/100-flat/256/download-2-icon.png"></a>
                    </td>


                                       <td>
        <a href="nuevo_cert.php?edit=<?php echo $row ['id']; ?>"
        class="btn btn-success btn-sm" ><img src="https://lh3.googleusercontent.com/proxy/2S3WmmB1qSjS-RHyvvvTf-Z2u1czaX8PzFHS071U1y6f6c-qrJNaAudQSKonq5krWJlUBd7a6sSQofIPOTj4-HfnSmtd6yvgSf1KspHxO8tst0JhOQgC5XsgRTft7rDudO9HwkxgqET7ceBiNBS7j6YoNg"width="35" height="15"></a>
          <a href="process.php?delete=<?php echo $row ['id']; ?>"
         class="btn btn-danger btn-sm"> <img src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-and-shapes-4/177800/175-512.png"width="35" height="15"></a>

<?php endwhile; ?>
      </td>
      </tr>

    </tbody>
  </table>
   <div class="container">
        
        <a href="nuevo_cert.php"><img src="https://cdn.icon-icons.com/icons2/20/PNG/256/business_application_addmale_useradd_insert_add_user_client_2312.png "width="50" height="40">Nuevo Certificado</a>

      </div>
      <div class="container">
        <nav aria-label="Page navigation example">
  <ul class="pagination">

        <?php for ($page=1;$page<=$number_of_pages;$page++) {

  echo '<a class="page-link"href="index.php?page=' . $page . '">' . $page . '</a> ';
}

 ?>
   </ul>
</nav>
      </div>
</div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <footer  class="py-4 bg-dark text-white ">
    <div class="container text-center  ">
      <small>Copyright &copy; Dipésca</small>
    </div>
  </footer>
  </body>
 
</html>
