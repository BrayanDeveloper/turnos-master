<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
<?php include 'inc/css.php'; ?>

<?php if (@$_POST['user']){
	include 'controllers/funciones.php';
		$funciones = new Funciones();
		$login = $funciones->Login($_POST['user'],$_POST['password']);
	} 
 ?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body" id="res">
            <h5 class="card-title text-center">Ingresa</h5>
            <!-- <center><img src="assets/img/logo.png" alt=""></center>	 -->
            <form class="form-signin" action="" method="post">
            	<div id="contenido"></div>
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="user">
                <label for="inputEmail">Usuario</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                <label for="inputPassword">Contraseña</label>
              </div>

              <!-- <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div> -->
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Ingresar</button>
              
              <hr class="my-4">
              <!-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include 'inc/js.php'; ?>
