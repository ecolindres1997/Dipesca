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
         <link href="maga.ico" rel="icon" type="image/png" />
  </head>
  <body>

  <div class="pos-f-t">
  <div class="collapse navbar-expand-lg navbar-light bg-light" id="navbarToggleExternalContent" >
    <div class="bg-dark p-4">
      <h4 class="text-white">CATALOGOS</h4>
      <a class="navbar-brand text-danger" href="salir.php">Salir</a>
      <a class="navbar-brand text-white" href="usuarios/">Usuarios</a>
      <a class="navbar-brand text-white" href="embarcaciones/">Embarcaciones</a>
      <a class="navbar-brand text-white" href="empresas/">Empresas</a>
      <a class="navbar-brand text-white" href="artesPesca/">ArtesPesca</a>
      <a class="navbar-brand text-white" href="especie/">Especies</a>
      <a class="navbar-brand text-white" href="area_geografica">Areas Geograficas</a>
      <a class="navbar-brand text-white" href="comunidad">Comunidades </a>
      <a class="navbar-brand text-white" href="#">Cert Sanitario </a>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
    <div class="container">
      <div class="col-sm-3 col-md-8 col-lg-12">
<div class="card text-center">
  <div class="card-header">
        MODULOS  
    <?php 
    session_start(); 
    $EMAIL = $_SESSION['correo_electronico'];
if (!isset($EMAIL)) {
 header('location: login.php');
}else {
  echo "bienvenido $EMAIL";
}
 ?>

  </div>
<div class="row">
  <div class="col-sm-12 col-md-6 col-lg-3">
    <div class="card">
      <div class="card-body">
    <h5 class="card-title">Registro de Pesca:</h5>
       <a href="#" ><img src="https://st.depositphotos.com/1322515/5148/i/950/depositphotos_51489601-stock-photo-user-blue-icon.jpg"width="210" height="240" ></a>
      </div>
    </div>
  </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
    <div class="card">
      <div class="card-body">
   <h5 class="card-title">Certificado Captura:</h5>
       <a href="Cert_captura" ><img src="https://icons.iconarchive.com/icons/jommans/briefness/256/Folder-Documents-icon.png"width="210" height="240"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-3">
    <div class="card">
      <div class="card-body">
   <h5 class="card-title">Anexo 4:</h5>
       <a href="Anexo4" ><img src="https://static.makeuseof.com/wp-content/uploads/2012/07/Attachments.me-Logo-300x300.jpg"width="210" height="240"></a>
      </div>
    </div>
  </div>

   <div class="col-sm-12 col-md12 col-lg-3">
    <div class="card">
      <div class="card-body">
   <h5 class="card-title">Seguridad:</h5>
       <a href="#" ><img src="https://www.interwins.cl/wp-content/uploads/2016/05/ico-seguridad.png"width="210" height="240"></a>
      </div>
    </div>
  </div>

</div>
</div>
  <div class="card-footer text-muted">
    Direccion de Normatividad de la Pesca y Acuicultura
  </div>

   </div>
   </div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
    <footer  class="py-4 bg-dark p-4 text-white fixed-bottom">
    <div class="container text-center ">
      <small>Copyright &copy; Dipésca</small>
    </div>
  </footer>
</html>