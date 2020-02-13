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
      <a class="navbar-brand text-white" href="../modulos/">INICIO</a>
      <a class="navbar-brand text-white" href="../usuarios/">USUARIOS</a>
       <a class="navbar-brand text-white" href="../embarcaciones/">Embarcaciones</a>
      <a class="navbar-brand text-white" href="#">Empresas</a>
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

<div class="container">
  <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="row">
    <div class=" col-sm-12 col-md-6">
    <div class="form-group">
      <label for="nombre1">primer nombre</label>
      <input type="text" name="PRIMER_NOMBRE" class="form-control" class="required"
      value="<?php echo $PRIMER_NOMBRE; ?>"placeholder="ingrese el nombre1">
      </div>
        </div>
      <div class=" col-sm-12 col-md-6">
      <div class="form-group">
      <label for="nombre2">segundo nombre</label>
      <input type="text" name="SEGUNDO_NOMBRE" class="form-control" class="required"
      value="<?php echo $SEGUNDO_NOMBRE; ?>"placeholder="ingrese el nombre2">
      </div>
    </div>
  </div>
        <div class="row">
    <div class=" col-sm-12 col-md-6">
    <div class="form-group">
      <label for="Apellido1">primer apellido</label>
     <input type="text" name="PRIMER_APELLIDO" class="form-control" class="required" value="<?php echo $PRIMER_APELLIDO?>"placeholder="INGRESE EL APELLIDO 1">
</div>
</div>
 <div class=" col-sm-12 col-md-6">
 <div class="form-group">
      <label for="Apellido2">segundo apellido</label>
     <input type="text" name="SEGUNDO_APELLIDO" class="form-control" class="required" value="<?php echo $SEGUNDO_APELLIDO?>"placeholder="INGRESE EL APELLIDO 2">
</div>
</div>
</div>
        <div class="row">
    <div class=" col-sm-12 col-md-6">
 <div class="form-group">
      <label for="tipo">Tipo</label>
       <select  class="form-control" name="ID_TIPO">
        <option value="0"><?php echo "$ID_TIPO"; ?></option>
        <?php
          $query = $conexion -> query ("SELECT  * FROM tipo");
          while ($ID_TIPO = mysqli_fetch_array($query)) {
            echo '<option value="'.$ID_TIPO[id].'">'.$ID_TIPO[nombre_id].'</option>';
          }
        ?>
      </select>

</div>
</div>
<div class=" col-sm-12 col-md-6">
 <div class="form-group">
      <label for="tipo">Genero</label>
       <select  class="form-control" name="ID_GENERO">
        <option value="0"><?php echo "$ID_GENERO"; ?></option>
        <?php
          $query = $conexion -> query ("SELECT * from genero");
         
          while ($ID_GENERO = mysqli_fetch_array($query)) {
            echo '<option value="'.$ID_GENERO[id].'">'.$ID_GENERO[Nombre_genero].'</option>';
          }
        ?>
      </select>
</div>
</div>
</div>

<div class="row">
 <div class=" col-sm-12 col-md-4">
 <div class="form-group">
      <label for="EMAIL">Telefono</label>
     <input type="text" name="EMAIL" class="form-control" class="required" value="<?php echo $EMAIL?>"placeholder="CORREO">
</div>
</div>
 <div class=" col-sm-12 col-md-4">
 <div class="form-group">
      <label for="Apellido2">Password</label>
     <input type="password" name="PASSWORD" class="form-control" class="required" value="<?php echo $PASSWORD?>"placeholder="Contraseña">
</div>
</div>
 <div class=" col-sm-12 col-md-4">
 <div class="form-group">
      <label for="Apellido2">Telefono</label>
     <input type="text" name="TELEFONO" class="form-control" class="required" value="<?php echo $TELEFONO?>"placeholder="Numero de Telefono">
</div>
</div>
</div>
<div class="row">
 <div class=" col-sm-12 col-md-4">
 <div class="form-group">
      <label for="Apellido2">Identificación</label>
     <input type="text" name="IDENTIFICACION" class="form-control" class="required" value="<?php echo $IDENTIFICACION?>"placeholder="NUMERO DE IDENTIFICACION">
</div>
</div>
 <div class=" col-sm-12 col-md-4">
 <div class="form-group">
      <label for="Apellido2">Concesión</label>
     <input type="TEXT" name="CONCESION" class="form-control" class="required" value="<?php echo $CONCESION?>"placeholder="CONCESION DE PESCA">
</div>
</div>
 <div class=" col-sm-12 col-md-4">
 <div class="form-group">
      <label for="Apellido2">Domicilio</label>
     <input type="text" name="DOMICILIO" class="form-control" class="required" value="<?php echo $DOMICILIO?>"placeholder="DOMICILIO">
</div>
</div>
</div>

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
