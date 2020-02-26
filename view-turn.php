<?php 
  require 'controllers/funciones.php';
  $funciones = new Funciones();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Turnos</title>

  
  <?php include 'inc/css-admin.php'; ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <input type="hidden" id="accion" name="accion" value="turno_publico">
        <!-- Topbar -->
        
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
      <div class="container-fluid">
          
          <div class="row">

            <div class="col-xl-6 col-md-6 col-sm-12 mb-8">
              <div class="" id="success" style="text-align: center;"></div>
            </div>

            <div class="col-xl-6 col-md-6 col-sm-12 mb-8">
              <div class="" id="">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/tw_rsITLgZ0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>            

          </div>
            
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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  
  <?php include 'inc/js-admin.php'; ?>
  <script>
    // ver turnos en tiempo real
      function datosTime(){
          var accion = $('#accion').val();
        $.post({
          type: 'POST',
          url: 'models/vistas',
          data: {
          "accion": accion
        },
            success: function(r){
              $('#success').html(r);                                   
            }
        });
      }
        setInterval(datosTime, 1000);

         
      
      
  </script>
</body>

</html>
