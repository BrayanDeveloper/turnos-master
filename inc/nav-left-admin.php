<?php if ($_SESSION['privilegio']=='1') {
?>
<ul class="navbar-nav bg-gradient- sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(to right, #901000, gray);">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0">
          <!-- <img src="assets/img/logo.png" alt="" width="100%"> -->
        </div>
        <div class="sidebar-brand-text mx-3">   <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Panel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Modulos
      </div>

   
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <img src="assets/img/iconos/pacientes.png" alt="">
          <span>Pacientes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="patients">Ver Pacientes</a>
            <a class="collapse-item" href="new-patient">Nuevo Paciente</a>
            
          </div>
          
        </div>

      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <img src="assets/img/iconos/turnos.png" alt="">
          <span>Turno</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="digitador">Solicitar Turno</a>
            <a class="collapse-item" href="turn-secretary">Ver turnos</a>

            
          </div>
        </div>
          
      </li>

      <li class="nav-item">
          <a href="user-medic" class="nav-link"><img src="assets/img/iconos/medicos.png" alt=""> Medicos</a>
          <a href="user-secretary" class="nav-link"><img src="assets/img/iconos/secre.png" alt=""> Secretaria</a>
          <a href="citation" class="nav-link"><img src="assets/img/iconos/citas.png" alt=""> Citas</a>
          <!-- <a href="" class="nav-link"><i class="fas fa-clipboard-list"></i> </a> -->
          

        
      </li>

    </ul>
    
<?php  
}
else if ($_SESSION['privilegio']=='2') {
?>
<ul class="navbar-nav bg-gradient- sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(to right, #901000, gray);">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0">
          <!-- <img src="assets/img/logo.png" alt="" width="100%"> -->
        </div>
        <div class="sidebar-brand-text mx-3">   <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Secretaria Panel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Modulos
      </div>

   
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <img src="assets/img/iconos/pacientes.png" alt="">
          <span>Pacientes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="patients">Ver Pacientes</a>
            <a class="collapse-item" href="new-patient">Nuevo Paciente</a>
            
          </div>
          
        </div>

      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <img src="assets/img/iconos/turnos.png" alt="">
          <span>Turno</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="digitador">Solicitar Turno</a>
            <a class="collapse-item" href="turn-secretary">Ver turnos</a>

            
          </div>
        </div>
          
      </li>

      <li class="nav-item">
          <a href="user-medic" class="nav-link"><img src="assets/img/iconos/medicos.png" alt=""> Medicos</a>
          <a href="user-secretary" class="nav-link"><img src="assets/img/iconos/secre.png" alt=""> Secretaria</a>
          <a href="citation" class="nav-link"><img src="assets/img/iconos/citas.png" alt=""> Citas</a>
          <!-- <a href="" class="nav-link"><i class="fas fa-clipboard-list"></i> </a> -->
          

        
      </li>

    </ul>
    
<?php  
}
else if ($_SESSION['privilegio']=='3') {
?>
<ul class="navbar-nav bg-gradient- sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(to right, #901000, gray);">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0">
          <!-- <img src="assets/img/logo.png" alt="" width="100%"> -->
        </div>
        <div class="sidebar-brand-text mx-3">   <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Medico Panel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Modulos
      </div>

   
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <img src="assets/img/iconos/citas.png" alt="">
          <span>Citas</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="citation">Ver Citas</a>
            <!-- <a class="collapse-item" href="new-citation">Nueva Cita</a> -->
            
          </div>
          
        </div>

      </li>
      <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <img src="assets/img/iconos/turnos.png" alt="">
          <span>Turno</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="digitador">Solicitar Turno</a>
            <a class="collapse-item" href="turn-secretary">Ver turnos</a>

            
          </div>
        </div>
          
      </li> -->

      <li class="nav-item">
          <!-- <a href="user-medic" class="nav-link"><img src="assets/img/iconos/medicos.png" alt=""> Medicos</a> -->
          <!-- <a href="user-secretary" class="nav-link"><img src="assets/img/iconos/secre.png" alt=""> Secretaria</a> -->
          <!-- <a href="citation" class="nav-link"><img src="assets/img/iconos/citas.png" alt=""> Citas</a> -->
          <!-- <a href="" class="nav-link"><i class="fas fa-clipboard-list"></i> </a> -->
          

        
      </li>

    </ul>
    
<?php  
}
  