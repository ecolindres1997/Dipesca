<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="../maga.ico" rel="icon" type="image/png" />
    <title>AgregarUsuario</title>
  </head>
  <body>
     <div class="pos-f-t">
  <div class="collapse navbar-expand-lg navbar-light bg-light" id="navbarToggleExternalContent" >
    <div class="bg-dark p-4">
      <h4 class="text-white">CATALOGOS</h4>
      <a class="navbar-brand text-white" href="../">INICIO</a>
              <a class="navbar-brand text-white" href="../embarcaciones/">Embarcaciones</a>
      <a class="navbar-brand text-white" href="../empresas/">Empresas</a>
      <a class="navbar-brand text-white" href="../artesPesca/">Artes de Pesca</a>
      <a class="navbar-brand text-white" href="#">Especies</a>
      <a class="navbar-brand text-white" href="#">Areas Geograficas</a>
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

<div class="container text-center">
  <?php


 
    $EMAIL = $_SESSION['correo_electronico'];
if (!isset($EMAIL)) {
 header('location: ../index.php');
}else {
  echo " Usuario    $EMAIL";
}

 ?>
 </div> 
 <div class="container ">
  <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="row">
    <div class=" col-sm-12 col-md-6">
    <div class="form-group">
      <label for="nombre1">Nombre de la Embarcacion</label>
      <input type="text" name="NombreEmb" class="form-control" class="required"
      value="<?php echo $NombreEmb; ?>"placeholder="Ingrese el nombre">
      </div>
        </div>
      <div class=" col-sm-12 col-md-6">
      <div class="form-group">
      <label for="nombre2">Modelo</label>
      <input type="text" name="Modelo" class="form-control" class="required"
      value="<?php echo $Modelo; ?>"placeholder="Ingrese el Modelo">
      </div>
    </div>
  </div>
        <div class="row">
 <div class=" col-sm-12 col-md-6">
 <div class="form-group">
      <label for="Apellido2">Bandera </label>
     <input type="text" name="Bandera" class="form-control" class="required" value="<?php echo $Bandera?>"placeholder="Ingrese La Bandera">
</div>
</div>

    <div class=" col-sm-12 col-md-6">
 <div class="form-group">
      <label for="tipo">Tipo</label>
       <select  class="form-control" name="TipoEmb">
        <option value="0"><?php echo "$TipoEmb"; ?></option>
        <?php
          $query = $conexion -> query ("SELECT  * FROM tipo_embarcacion");
          while ($TipoEmb = mysqli_fetch_array($query)) {
            echo '<option value="'.$TipoEmb[id].'">'.$TipoEmb[nombre_tipo].'</option>';
          }
        ?>
      </select>

</div>
<button type="button" class="btn " data-toggle="modal" data-target="#exampleModal"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSMS-48QPXPwGikgySsByXQcJHaTeChuV230fE-SnzqDJUTrysN"width="35" height="25">
  Agrega Nuevo Tipo
</button>

<!-- Modal -->

<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar tipo de Embarcacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <div class="row">
    <div class=" col-sm-12 col-md-12">
    <div class="form-group">
      <label for="nombre1">Tipo de Embarcacion</label>
      <input type="text" name="NameTipo" class="form-control" required
      value="<?php echo $NameTipo; ?>"placeholder="Ingrese el Tipo">
      </div>
        </div>
  </div>

</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary "name="save_tipo">Save changes</button>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
