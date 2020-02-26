<?php session_start(); ?>
<?php include 'inc/redireccion.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Nuevo Medico</title>

  
  <?php include 'inc/css-admin.php'; ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'inc/nav-left-admin.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'inc/nav-top-admin.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <div class="row">
            <div class="">
                    <div class="card-title">
                      <legend class="btn">Nuevo Medico</legend>
                    </div>
                  </div>
          </div>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
           
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card border-left-primary shadow h-100 py-2">
                  

                <div class="card-body">
                  <form method="post" id="datos-new-medic">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Usuario</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usuario" placeholder="usuario" value="" required id="usuario">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Clave</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="clave" placeholder="clave" value="" required id="clave">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cedula</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cedula" placeholder="Cedula" value="" required id="cedula">
                      
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre" value="" name="nombre" required id="nombre">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Apellido</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellido" value="" name="apellido" required id="apellido">
                      
                    </div>
                    
                    
            
                  
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card shadow h-100 py-2">
                <div class="card-body">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Correo</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" placeholder="Correo" value="" required id="correo">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Celular</label>
                      <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Celular" value="" name="celular" required id="celular">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fecha De Nacimiento</label>
                      <input type="date" class="form-control" id="exampleInputPassword1" placeholder="" value="" name="fecha_nacimiento" required id="fecha_nacimiento">
                      <input type="hidden" name="accion" value="new-medic" id="accion">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="envio-medic">Guardar</button>
                  </form>
                </div>
              </div>
            </div>
            <div id="success"></div>
            </div>
    
      <?php include 'inc/footer.php'; ?>
      

    </div>
    

  </div>
  

  
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> -->
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  
  <?php include 'inc/js-admin.php'; ?>
 
</body>

</html>
