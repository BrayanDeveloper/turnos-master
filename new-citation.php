<?php 
  require 'controllers/funciones.php';
  $funciones = new Funciones();
?>
<?php include 'inc/redireccion.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Nueva Citacion</title>

  
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
                      <legend class="btn">Agregando Cita</legend>
                    </div>
                  </div>
          </div>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
           
            <div class="col-xl-4 col-md-12 mb-8">
              <div class="card border-left-primary shadow h-100 py-2">
                  

                <div class="card-body">
                  <form method="post" id="datos-new-citation">
                    <div class="form-group">
                      <label for="medico">Medico</label>
                      <?php $funciones->selectMedicosCitation(); ?>
                      
                    </div>
                    <div class="form-group">
                      <label for="paciente">Paciente</label>
                      <?php $funciones->selectPacientes(); ?>
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Fecha Cita</label>
                      <input type="date" class="form-control" aria-describedby="emailHelp" name="fecha" placeholder="fecha" value="" required id="fecha">
                      
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Hora Cita</label>
                      <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hora" value="" name="hora" required id="hora">
                      
                    </div>
                    <div class="card-body">
                  
                    
                      <input type="hidden" name="accion" value="new-citation" id="accion">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="envio-citation">Guardar</button> 
                    <a id="see-cf" class="btn btn-warning text-light">Ver Citas por otra fecha</a>
                    
                  <div id='campos_citas_otra_f' style="display: none;">
                    <br>
                        <label>Fecha:</label>
                        <input type="date" name="date-searh" class="form-control" id="date-searh">

                        <br>
                        <button type="button" class="btn btn-primary" name="searh-citation" id="searh-citation">Buscar Cita</button>
                        
                        
                      </div>
                    
                    
            
                  
                </div>
              </div>
            </div>
            <div class="col-xl-8 col-md-8 mb-8">
              <div class="card shadow h-100 py-2">
                
                  <div id="res"></div>
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
     <script>
      $(document).ready(function(){
        $('#paciente').select2();
        $('#medico_citation').select2();

      });
       $('#envio-citation').click(function(){
          var datos = $('#datos-new-citation').serialize();
          $.post({
            type: 'POST',
            url: 'models/add',
            data: datos,
              success: function(r){
              $('#success').html(r);                                   
                         
              }

            });
                                  
            return false;

            });
       $('#see-cf').click(function(){
        $('#campos_citas_otra_f').slideToggle();
      }); 

       $("#searh-citation").click(function(){
        $('#campos_date').hide();
        var medico = $('#medico_citation').val();
        var date_searh = $('#date-searh').val();
        var accion = "searh-date-citation";
         
         $.post({
          type: 'POST',
          url: 'models/vistas',
          data: {
            "medico": medico,
            "date_searh": date_searh,
            "accion": accion
          },
            success: function(r){
            $('#res').html(r);                                   
                
            }

        });
         
         return false;
      });
     </script>
</body>

</html>