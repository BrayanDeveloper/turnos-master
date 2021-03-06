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
                      <legend class="btn">Editar Cita</legend>
                    </div>
                  </div>
          </div>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
           
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card border-left-primary shadow h-100 py-2">
                  

                <div class="card-body">
                  <?php foreach ($funciones->verCitasForId($_GET['id']) as $value) {
                  ?>
                    <form method="post" id="datos-update-citation">
                          <div class="form-group">
                            Medico
                            <?php $funciones->selectMedicosCitation($value['id_medico'],$value['nombres_medico']); ?>
                            
                          </div>
                          <div class="form-group">
                            Paciente: <strong style="text-transform: uppercase;"><?php echo $value['nombres_paciente'];  ?></strong>
                            <input type="text" readonly="" name="paciente" value="<?php echo $value['cedula_paciente']; ?>" class="form-control">
                            
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Fecha Cita</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" name="fecha" placeholder="fecha" value="<?php echo $value['fecha_cita']; ?>" required id="fecha">
                            
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Hora Cita</label>
                            <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hora" value="<?php echo $value['hora_cita']; ?>" name="hora" required id="hora">
                            
                          </div>
                          
                        
                          
                            <input type="hidden" name="accion" value="update-citation" id="accion">
                            <input type="hidden" name="id" value="<?php echo $value['id_cita']; ?>" id="id">
                          
                          
                          <button type="submit" class="btn btn-primary" id="envio-citation-update">Guardar</button>
                          
                          
                          
                  
                        
                      </div>
                      </form>
                  <?php 
                  }?>
              </div>
            </div>
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card shadow h-100 py-2">
                
                  </form>
                </div>
              </div>
            </div>
            <div id="success"></div>

            

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
     <script>
       $('#envio-citation-update').click(function(){
          var datos = $('#datos-update-citation').serialize();
          $.post({
            type: 'POST',
            url: 'models/update',
            data: datos,
              success: function(r){
              $('#success').html(r);                                   
                         
              }

            });
                                  
            return false;

            });
     </script>
</body>

</html>
