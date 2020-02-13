
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="../maga.ico" rel="icon" type="image/png" />
    <style>
        li{
            cursor: pointer;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        li:hover{
          background-color: #eaeaea;
        }
    </style>
    <title>AgregarUsuario</title>
  </head>
  <body>
     <div class="pos-f-t">
  <div class="collapse navbar-expand-lg navbar-light bg-light" id="navbarToggleExternalContent" >
    <div class="bg-dark p-4">
      <h4 class="text-white">CATALOGOS</h4>
      <a class="navbar-brand text-white" href="../modulos/">INICIO</a>
      <a class="navbar-brand text-white" href="../usuarios/">USUARIOS</a>
         <a class="navbar-brand text-white" href="../embarcaciones/">Embarcaciones</a>
      <a class="navbar-brand text-white" href="#">Empresas</a>
      <a class="navbar-brand text-white" href="#">Artes de Pesca</a>
      <a class="navbar-brand text-white" href="#">Especies</a>
      <a class="navbar-brand text-white" href="#">Areas Geograficas</a>
      <a class="navbar-brand text-white" href="#">Comunidades </a>
      <a class="navbar-brand text-white" href="#">Cert Sanitario </a>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
<?php  require_once 'process.php'; ?>
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
<?php


 
    $EMAIL = $_SESSION['correo_electronico'];
if (!isset($EMAIL)) {
 header('location: ../index.php');
}else {
  echo "     $EMAIL";
}
 ?>
<div class="container">
  <form action="process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
             <div class="row">
    <div class=" col-sm-12 col-md-4">
    <div class="form-group">
      <label for="Apellido1">Contenedor</label>
     <input type="text" name="CONTENEDOR_NO" class="form-control" class="required" value="<?php echo $CONTENEDOR_NO?>"placeholder="Numero de Contenedor">
</div>
</div>

 <div class=" col-sm-12 col-md-4">
 <div class="form-group">
      <label for="Apellido2">Adjuntar Documentos</label>
          <input type="file" name="myfile" required> <br>
</div>
</div>
<!-- Button trigger modal -->

</div>
<div class="row">
  <div class=" col-sm-12 col-md-4">
    <div class="form-group">
      <label for="Apellido1">Usuario</label>
      <input type="text" name="CONTENEDOR_NO" class="form-control" class="required" placeholder="Numero de Usuario" id="searchInput" onkeyup="getSearch()">
      <input type='hidden' value='' id='usuarioId' name="usuarioId">
      <ul id="ulsearch">
      </ul>
      
    </div>
  </div>

<div class=" col-sm-12 col-md-6">
 <div class="form-group">
      <label for="genero">Certificado</label>
       <select  class="form-control" name="ID_CERTIFICADO">
        <option value="0" ><?php echo "$ID_CERTIFICADO"; ?></option>
        <?php
          $query = $conexion -> query ("SELECT * from  certificado_captura");
         
          while ($ID_CERTIFICADO = mysqli_fetch_array($query)) {
            echo '<option value="'.$ID_CERTIFICADO[id].'">'.$ID_CERTIFICADO[codigo_certificado].'</option>';
          }
        ?>
      </select>

</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agrega certificado
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>

</div>

</div>

</div>



  <?php

        if ($update == true): ?>
        <button type="submit" class="btn btn-info" name="update">Actualizar</button>
      <?php else: ?>
      <button type="submit" class="btn btn-info" name="save">guardar</button>
      <?php endif; ?>
      <a href="index.php" class="btn btn-success">regresar</a>
    </form>
</div>
</div>
</form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="../js/js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
