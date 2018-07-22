<?php
  require '../scripts/funciones.php';
  

  if(!sesionIniciada() || !esAdmin()){
     header('Location: index.html');
  }


  if(isset( $_GET['usuario']))
  $usuario = $_GET['usuario'];
  else  header('Location: index.php');
  
  conectar();
  $categorias=getTodasCategorias();
  

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <?php include 'menu-superior.php' ?>

    <div class="container-fluid">
      <div class="row">
       
       <?php include 'menu-lateral.php' ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Panel de Permisos</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

              <div class="card " >
                <h5 class="card-header" >Permisos del usuario </h5>
                  <form action="../scripts/actualizarPermisos.php" method="POST">
                      <div class="col-sm-2"></div>                    
                      <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" value="<?php echo $_GET['usuario']?>" readonly>
                        </div>
                      </div>
                     <?php foreach ($categorias as $categoria): ?>
                            <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-3">
                                                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="categoria<?= $categoria[0] ?>" <?php if(tienePermisos($usuario, $categoria[0])) echo "checked" ?>> <?= $categoria[1] ?>
                    </label>                                          
                  </div>
                            </div>
                          </div>                    
                    <?php  endforeach;
                          desconectar();
                    ?>


                      <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-default">Confirmar</button>
                        </div>
                      </div>
                    </form>
              </div>
                


          <h1 class="h2"></h1>
          <div class="table-responsive">
              
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
   
  </body>
</html>