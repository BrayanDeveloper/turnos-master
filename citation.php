<?php 
  require 'controllers/funciones.php';
  $funciones = new Funciones();
?>
<?php include 'inc/redireccion.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Citas</title>

  
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Citas</h1>
            <div id="success"></div>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      
                      <?php 
                      if ($_SESSION['privilegio']=='1') {
                        echo '<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="new-citation" class="btn btn-primary">Nueva Cita Externa</a></div>';
                      }
                      else if ($_SESSION['privilegio']=='2') {
                        echo '<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="new-citation" class="btn btn-primary">Nueva Cita Externa</a></div>';
                      }
                      else if ($_SESSION['privilegio']=='3') {
                        
                      }
                      ?>
                      <!-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a class="btn btn-warning" id="btn-filtro-fecha">Filtrar por Fecha</a></div> -->
                      <div id="espacio-filtro" style="display: none; width:30%;">
                        <input type="date" name="date" id="date" class="form-control">
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="espacio-resultado"><?php $funciones->verCitas(); ?></div>
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                    
                  </div>
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
    $(document).ready( function () {
      $('#table').DataTable();
    } );

    $('#btn-filtro-fecha').click(function(){
      $('#espacio-filtro').slideToggle();
    });

    $('#date').change(function(){
      var date = $('#date').val();
      $.post({
        type: "POST",
        url: "models/vistas",
        data: {
          "date": date,
          "accion": "filtro_fecha_citation"
        },
        success: function(r){
          $('#espacio-resultado').empty();
          $('#espacio-resultado').html(r);
          $('#table').DataTable();

        }
      });
    });
  </script>
</body>

</html>
