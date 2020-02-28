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
                      <legend class="btn">Sacando Citas</legend>
                    </div>
                  </div>
          </div>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
           
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card border-left-primary shadow h-100 py-2">
                  

                <div class="card-body">
                  <form method="post" id="datos-new-citation-turn">
                    <div class="form-group">
                      <label for="paciente">Cedula Paciente</label><br>
                      <input type="text" name="paciente" id="paciente" value="<?php echo @$_GET['id']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label for="nombre_paciente">Nombre Paciente</label>
                      <input type="text" name="nombre_paciente" id="nombre_paciente" value="<?php echo @$_GET['nombre']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label for="medico">Medico</label>
                      <?php $funciones->selectMedicos(); ?>
                      
                    </div>

                    
                    <input type="hidden" name="accion" id="accion" value="hide-new-citation-turn">
                    <input type="hidden" name="id_turno" id="id_turno" value="<?php echo @$_GET['id_turno']; ?>">

                  
                </div>
              </div>
              </div>
           
            <div class="col-xl-8 col-md-12 mb-16">
              <div class="card border-left-primary shadow h-100 py-2">
                  

                <div class="card-body">
                    
                      <div id="success"></div>
                      <br>
                      <div id='campos_date' style="display: none;">
                        <label>Fecha:</label>
                        <input type="date" name="date" class="form-control" id="date">
                        <label>Hora:</label>
                        <input type="time" name="time" class="form-control" id="time">
                        <br>
                        <input type="submit" class="btn btn-primary" name="envio-new-citation-turn"  id="envio-new-citation-turn" value="Guardar Cita">

                      </div>
                      <div id='campos_citas_otra_f' style="display: none;">
                        <label>Fecha:</label>
                        <input type="date" name="date-searh" class="form-control" id="date-searh">

                        <br>
                        <button class="btn btn-primary" name="searh-citation" id="searh-citation">Buscar Cita</button>
                        <div id="res"></div>
                      </div>
                      
             </form>
                              
                </div>
              </div>
              <div id="resultado"></div>
              
            </div>

          </div>
            
      <br>
            


      
      <?php include 'inc/footer.php'; ?>
      

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
  <script type="text/javascript">
    $(document).ready(function(){
      // $('.medico').select2();
    });
    //$('#campos_date').hide();

    // guarda cita
      $("#envio-new-citation-turn").click(function(){
        $('#campos_date').hide();
        //document.getElementById('campos_citas_otra_f').style.display('none');
        var datos = $('#datos-new-citation-turn').serialize();
        
         $.post({
          type: 'POST',
          url: 'models/add',
          data: datos,
            success: function(r){

            $('#resultado').html(r);                                   
                
            }

        });
         
         return false;
      });

      $("#searh-citation").click(function(){
        $('#campos_date').hide();
        var medico = $('#medico').val();
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