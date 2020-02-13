
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="maga.ico" rel="icon" type="image/png" />
    <title>Login!</title>
  </head>
  <body>
<?php require_once 'logica/loguear.php'; ?>
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
<center>


  <form action="logica/loguear.php" method="POST">
    <div class="container">
 <div class=" col-sm-12 col-md-8 col-lg-5">
<div class="card text-center">
  <div class="card-header">

       <img src="https://www.maga.gob.gt/wp-content/uploads/2020/01/lmaga-20.jpg"width="180" height="150"align="center"> 

        
           <img src="https://lh3.googleusercontent.com/uNrhybSsW9R1iMtecgpIX4gGpAUz_jnKRbLsDovEsvGTWv8IVDbUitc0nSBk3HCl1A"width="180" height="150"
   align="center">   


  </div>
 <div class="form-group">
      <label for="Apellido2">Email</label>
     <input type="email" name="EMAIL" class="form-control "  placeholder="CORREO ELECTRONICO" required>
</div>


 <div class="form-group">
      <label for="Apellido2">Password</label>
     <input type="password" name="PASSWORD" class="form-control"  placeholder="Contraseña" required>
</div>

  <button type="submit" name="entrar" class="btn btn-primary">Ingresar  </button>
</div>
</div>
</div>
</form>
</center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>