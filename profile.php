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


  <title>Dashboard - Administracion</title>

  
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

          <!-- Page Heading -->
         <!--  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
 -->
          
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <form action="models/update" method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" placeholder="Nombre" value="<?php echo $_SESSION['nombre']; ?>" required>
                      <small id="emailHelp" class="form-text text-muted">Cambia tu usuario.</small>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Usuario</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario" value="<?php echo $_SESSION['usuario']; ?>" name="usuario" required>
                      <small id="emailHelp" class="form-text text-muted">Cambia tu usuario.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" value="<?php echo $_SESSION['email']; ?>" name="email" required>
                      <small id="emailHelp" class="form-text text-muted">Cambia tu Email.</small>
                    </div>
                    
                    
            
                  
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card shadow h-100 py-2">
                <div class="card-body">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Telefono</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="telefono" placeholder="Telefono" value="<?php echo $_SESSION['telefono']; ?>" required>
                      <small id="emailHelp" class="form-text text-muted">Cambia tu usuario.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $_SESSION['pass']; ?>" name="clave" required>
                      <input type="hidden" name="accion" value="update_profile">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <form action="models/update" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <img src="assets/img/profile/<?php echo $_SESSION['imagen_profile']; ?>" alt="" width="30%" style="border-radius: 50%;">
                      <label for="exampleInputEmail1">Foto de perfil</label>
                      <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="foto" placeholder="Nombre" value="<?php echo $_SESSION['nombre']; ?>" required>
                      <small id="emailHelp" class="form-text text-muted">Cambia tu Foto de Perfil.</small>
                      <input type="hidden" name="accion" value="update_photo_profile">

                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  <!-- </form>

                  <br>
                  <form action="models/update" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <img src="assets/img/profile/<?php echo $_SESSION['imagen_profile']; ?>" alt="" width="30%" style="border-radius: 50%;">
                      <label for="exampleInputEmail1">Cambiar Tema</label>
                      <select name="tema" id="" class="form-control">
                        <option value="<?php echo $_SESSION['tema']; ?>"><?php echo $_SESSION['tema']; ?></option>
                        <option value="oscuro">Oscuro</option>
                        <option value="claro">Claro</option>

                      </select>
                      <small id="emailHelp" class="form-text text-muted">Cambia tu Foto de Perfil.</small>
                      <input type="hidden" name="accion" value="update_theme_profile">

                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form> -->
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            

          
        

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
