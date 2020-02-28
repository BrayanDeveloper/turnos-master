<?php 
	session_start();
	require 'conexion.php';
	/**
	 * 
	 */
	class Funciones extends Conexion
	{
		function Login($u,$p){
			$sql = "SELECT * FROM usuarios WHERE usuario = '".$u."' and clave = '".$p."'; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			foreach ($consulta as $key) {
			    @$_SESSION['id_usuario'] = $key['id_usuario'];
			    @$_SESSION['usuario'] = $key['usuario'];
			    @$_SESSION['rol'] = $key['rol'];
			    @$_SESSION['nombre'] = $key['nombre'];
			    @$_SESSION['telefono'] = $key['telefono'];
			    @$_SESSION['email'] = $key['email'];
			    @$_SESSION['pass'] = $key['clave'];
			    @$_SESSION['imagen_profile'] = $key['imagen_profile'];
			    @$_SESSION['privilegio'] = $key['privilegio'];
			    @$_SESSION['n_modulo'] = $key['n_modulo'];
			    @$_SESSION['estado_modulo'] = $key['estado_modulo'];
			}
			if ($consulta and $_SESSION['rol']=='admin') {
				
				// $fecha = date('Y-m-d H:i:s');
				// $sql = "INSERT INTO logs(accion,estado,fecha,id_usuario)VALUES('inicio session','activo','".$fecha."',".$_SESSION['id_usuario'].")";
				// @$statement = Conexion::Conectar();
				// $consulta = $statement->query($sql);


				if ($_SESSION['privilegio']=='2') {
					echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>';
					
					echo "
					<script>
					

					while(true){
					  	var modulo = prompt('Hola Secretaria: ".$_SESSION['usuario']." Cual es tu numero de modulo?');
							if(!isNaN(modulo) && modulo != null && modulo != ''){
							  var confirmacion = confirm('Estas seguro de que ' + modulo + ', es tu modulo?');
								if(confirmacion)
								{
									$.post({
									type: 'POST',
									url: 'models/update',
									data: {
										'n_modulo': modulo,
										'accion': 'update_modulo'
										},
									success: function(r){
											$('#res').html(r);
									}
									});
									break;
									
								}
								else
								{
									location.href = ('login');
								}
							
					    	break;
					  	}

					  	else
							{
								alert('No se permite valores que no sean numeros, Vuelve a Ingresar ');
								location.href = ('login');
							}
							break;
					  }

					
					</script>					
					";
				}

				else if ($_SESSION['privilegio']=='1') {
					echo "<script>
						location.href = 'admin';
					  </script>";
				}
				else if ($_SESSION['privilegio']=='3') {
					echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>';
					
					echo "
					<script>
					

					while(true){
					  	var modulo = prompt('Hola Medico: ".$_SESSION['usuario']." Cual es tu numero de Consultorio?');
							if(!isNaN(modulo) && modulo != null && modulo != ''){
							  var confirmacion = confirm('Estas seguro de que ' + modulo + ', es tu Consultorio?');
								if(confirmacion)
								{
									$.post({
									type: 'POST',
									url: 'models/update',
									data: {
										'n_modulo': modulo,
										'accion': 'update_consultorio'
										},
									success: function(r){
											$('#res').html(r);
									}
									});
									break;
									
								}
								else
								{
									location.href = ('login');
								}
							
					    	break;
					  	}

					  	else
							{
								alert('No se permite valores que no sean numeros, Vuelve a Ingresar ');
								location.href = ('login');
							}
							break;
					  }

					
					</script>					
					";
				}
				
			}
			else if ($consulta and $_SESSION['rol']=='user') {
				$fecha = date('Y-m-d H:i:s');
				$sql = "INSERT INTO logs(accion,estado,fecha,id_usuario)VALUES('inicio session','activo','".$fecha."',".$_SESSION['id_usuario'].")";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);
				echo "<script>
						location.href = 'user';
					  </script>";
			}
			else 
			{
				echo "<script>
						alert('Datos de ingreso no validos, volver a ingresar');
						location.href = 'login';
					  </script>";
			}
		}

		


		function editarUsuarioId($id){
			$sql = "SELECT * FROM usuarios WHERE id_usuario = ". $id;
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			foreach ($consulta as $value) {
			    echo 
			    '
					<form method="post" id="datos">
                    <table>
                      <tr>
                        <th>Usuario: </th>
                      
                      
                      <td><input type="text" name="usuario" class="form-control" placeholder="Usuario" id="usuario" value="'.$value['usuario'].'"> </td>
                      
                      <tr>
                        <th>
                          <label for="Clave">Clave: 
                        </label>
                        </th>
                        <td><input type="password" class="form-control" name="clave" id="clave" placeholder="Clave" value="'.$value['clave'].'"></td>
                      </tr>
                      <tr>
                        <th>
                          <label for="rol">Rol: 
                        </label>
                        </th>
                        <td>
                            <select type="text" class="form-control" name="rol" id="rol">
                              <option value="'.$value['rol'].'">'.$value['rol'].'</option>
                              <option value="admin">Admin</option>
                              <option value="no admin">No admin</option>
                            </select>
                        </td>
                      </tr>
            
                      <tr>
                        
                       <input type="hidden" name="accion" id="accion" value="edit_user">
                       <input type="hidden" name="id" id="id" value="'.$value['id_usuario'].'">
                       <td><input type="submit" class="btn btn-success" value="Guardar" id="editar_user"></td>
                      </tr>

                    </table> 
                    <br>
                    </form> 	
			    ';
			}
		}

		#finalizar la seccion, guardando un registro en la base de datos, en la tabla logs

		function closeLogs(){
			$fecha = date('Y-m-d H:i:s');
			
		}

		#ver pacientes
		function verPacientes(){
			$sql = "SELECT * FROM pacientes order by id_paciente desc";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			echo "
			<div class='table-responsive'>
			<table width='100%' id='table' class='table-striped' style='font-size:14px;'>
               <thead>
               <tr>
				<th>CEDULA</th>
				<th>NOMBRE</th>
				<th>CORREO</th>
				<th>CELULAR</th>
				<th>FECHA NACIMIENTO</th>
				<th></th>
               </tr>
               </thead>
               <tbody>
			";
			foreach ($consulta as $value) {
			    echo 
			    '
					<tr>
                    	<td>'.$value['cedula_paciente'].'</td>
						<td>'.$value['nombre_paciente'].' '.$value['apellido_paciente'].'</td>
						<td>'.$value['correo_paciente'].'</td>
						<td>'.$value['celular_paciente'].'</td>
						<td>'.$value['fecha_nacimiento'].'</td>
						<td>
							<a href="edit-patient?id='.$value['id_paciente'].'"><img src="assets/img/iconos/pencil.png" /></a> 
							<a href="models/delete?model=patient&id='.$value['id_paciente'].'"><img src="assets/img/iconos/delete.png" /></a>
						</td>
					</tr>
			    ';
			}
			echo "</tbody></table></div>";
		}

		#ver pacientes
		function editarPacientes($id){
			$sql = "SELECT * FROM pacientes WHERE id_paciente=".$id." order by id_paciente desc";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo 
			    '
					<form method="post" id="datos-edit-patient">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cedula</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cedula" placeholder="Cedula" value="'.$value['cedula_paciente'].'" required id="cedula">
                      
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre" value="'.$value['nombre_paciente'].'" name="nombre" required id="nombre">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Apellido</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellido" value="'.$value['apellido_paciente'].'" name="apellido" required id="apellido">
                      
                    </div>
                                     
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card shadow h-100 py-2">
                <div class="card-body">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Correo</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" placeholder="Correo" value="'.$value['correo_paciente'].'" required id="correo">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Celular</label>
                      <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Celular" value="'.$value['celular_paciente'].'" name="celular" required id="celular">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fecha De Nacimiento</label>
                      <input type="date" class="form-control" id="exampleInputPassword1" placeholder="" value="'.$value['fecha_nacimiento'].'" name="fecha_nacimiento" required id="fecha_nacimiento">
                      <input type="hidden" name="accion" value="update-patient" id="accion">
                      <input type="hidden" name="id" value="'.$value['id_paciente'].'" id="id">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="update-patient">Guardar</button>
                  </form>

                    

                     	
			    ';
			}
			
		}

		#Ver turnos secretaria
		function verTurnoSecretaria(){
			$sql = "SELECT turnos.atendido, pacientes.id_paciente , pacientes.cedula_paciente AS cc, pacientes.nombre_paciente AS nombre, pacientes.apellido_paciente AS apellido, turnos.id_turno,turnos.turno FROM `turnos` RIGHT JOIN pacientes ON turnos.cedula = pacientes.cedula_paciente WHERE `atendido` BETWEEN 0 AND 2 AND turnos.fecha = CURDATE() ORDER BY turnos.turno ASC";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			echo "
			<div class='table-responsive'>
			<table width='100%' id='table' class='table-striped' style='font-size:14px;'>
               <thead>
               <tr>
				<th>CEDULA</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>TURNO</th>
				<th></th>
               </tr>
               </thead>
               <tbody>
			";
			foreach ($consulta as $value) {
				$habilite = '';
				$llamada = '';
				if ($_SESSION['privilegio']==1) {
					if ($value['atendido']==0) {
					$estadoColor = "btn-warning";
					$estado = "Llamar Paciente";
					$habilite = '';
					$llamada = '';
				}
				
				}
				else {
					if ($value['atendido']==0) {
					$estadoColor = "btn-warning";
					$estado = "Llamar Paciente";
					$habilite = '';
					$llamada = '<span id="llamando-paciente"  class="'.$estadoColor.'">
							<button id="btn-'.$value['id_turno'].'" style="background-color: transparent; outline: none; border:0;" type="button" value="'.$value['id_turno'].'" ><img src="assets/img/iconos/phone-call.png" title="'.$estado.'"/></button> 
					      </span>';
				}
				else if ($value['atendido']==1) {
					$estadoColor = "btn-success";
					$estado = "Poner en espera";
					$habilite = '<span id="atendiendo-paciente">
						    <button style="background-color: transparent; outline: none; border:0;" type="button" value="'.$value['id_turno'].'" ><img src="assets/img/iconos/clock.png" title="Atender paciente"/></button>
						  </span>';
					$llamada = '<span id="llamando-paciente"  class="'.$estadoColor.'">
							<button id="btn-'.$value['id_turno'].'" style="background-color: transparent; outline: none; border:0;" type="button" value="'.$value['id_turno'].'" ><img src="assets/img/iconos/phone-call.png" title="'.$estado.'"/></button> 
					      </span>';
				}
				else if ($value['atendido']=2) {
					$estadoColor = "";
					$estado = "";
					$habilite = '
						    <button style="background-color: transparent; outline: none; border:0;" type="button" value="'.$value['id_turno'].'" ><img src="assets/img/iconos/start.png"  title="Este Turno ya fue Atendido"/></button>';
					$llamada = '';
				}
				}

			    echo 
			    '
					<tr>
                    	<td>'.$value['cc'].'</td>
						<td>'.$value['nombre'].'</td>
						<td>'.$value['apellido'].'</td>
						<td>'.$value['turno'].'</td>
						<td>
						  '.$llamada.' 

						  '.$habilite.'
						  
						</td>
					</tr>
				 ';
			}
			echo "</tbody></table></div>";
		}

		#ver medicos
		function verMedicos(){
			$sql = "SELECT * FROM usuarios WHERE privilegio='3' order by id_usuario desc";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			echo "
			<div class='table-responsive'>
			<table width='100%' id='table' class='table-striped' style='font-size:14px;'>
               <thead>
               <tr>
				<th>USUARIO</th>
				<th>EMAIL</th>
				<th>NOMBRE</th>
				<th>TELEFONO</th>
				<th></th>
               </tr>
               </thead>
               <tbody>
			";
			foreach ($consulta as $value) {
			    echo 
			    '
					<tr>
                    	<td>'.$value['usuario'].'</td>
						<td>'.$value['email'].'</td>
						<td>'.$value['nombre'].' '.$value['apellido'].'</td>
						<td>'.$value['telefono'].'</td>
						<td>
							<a href="edit-medic?id='.$value['id_usuario'].'"><img src="assets/img/iconos/pencil.png" /></a> 
							<a href="models/delete?model=medic&id='.$value['id_usuario'].'"><img src="assets/img/iconos/delete.png" /></a>
						</td>
					</tr>        	
			    ';
			}
			echo "</tbody></table></div>";
		}

		#ver secretarios
		function verSecretaria(){
			$sql = "SELECT * FROM usuarios WHERE privilegio='2' order by id_usuario desc";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			echo "
			<div class='table-responsive'>
			<table width='100%' id='table' class='table-striped' style='font-size:14px;'>
               <thead>
               <tr>
				<th>USUARIO</th>
				<th>EMAIL</th>
				<th>NOMBRE</th>
				<th>TELEFONO</th>
				<th></th>
               </tr>
               </thead>
               <tbody>
			";
			foreach ($consulta as $value) {
			    echo 
			    '
					<tr>
                    	<td>'.$value['usuario'].'</td>
						<td>'.$value['email'].'</td>
						<td>'.$value['nombre'].'</td>
						<td>'.$value['telefono'].'</td>
						<td>
							<a href="edit-secretary?id='.$value['id_usuario'].'"><img src="assets/img/iconos/pencil.png" /></a> 
							<a href="models/delete?model=secretary&id='.$value['id_usuario'].'"><img src="assets/img/iconos/delete.png" /></a>
						</td>
					</tr>
				';
			}
			echo "</tbody></table></div>";
		}

		#ver Medico
		function editarMedico($id){
			$sql = "SELECT * FROM usuarios WHERE id_usuario=".$id." order by id_usuario desc";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo 
			    '
					<form method="post" id="datos-edit-medic">
					<div class="form-group">
                      <label for="usuario">Usuario</label>
                      <input type="text" class="form-control" aria-describedby="emailHelp" name="usuario" placeholder="usuario" value="'.$value['usuario'].'" required id="usuario">
                      
                    </div>
                    <div class="form-group">
                      <label for="clave">Clave</label>
                      <input type="password" class="form-control" aria-describedby="emailHelp" name="clave" placeholder="clave" value="'.$value['clave'].'" required id="clave">
                      
                    </div>
                    <div class="form-group">
                      <label for="cedula">Cedula</label>
                      <input type="text" class="form-control"aria-describedby="emailHelp" name="cedula" placeholder="Cedula" value="'.$value['cedula'].'" required id="cedula">
                      
                    </div>

                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre" value="'.$value['nombre'].'" name="nombre" required id="nombre">
                      
                    </div>
                    <div class="form-group">
                      <label for="apellido">Apellido</label>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Apellido" value="'.$value['apellido'].'" name="apellido" required id="apellido">
                      
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card shadow h-100 py-2">
                <div class="card-body">
                  
                    <div class="form-group">
                      <label for="correo">Correo</label>
                      <input type="text" class="form-control"aria-describedby="emailHelp" name="correo" placeholder="Correo" value="'.$value['email'].'" required id="correo">
                      
                    </div>
                    <div class="form-group">
                      <label for="celular">Celular</label>
                      <input type="number" class="form-control" placeholder="Celular" value="'.$value['telefono'].'" name="celular" required id="celular">
                      
                    </div>
                    <div class="form-group">
                      <label for="fecha_nacimiento">Fecha De Nacimiento</label>
                      <input type="date" class="form-control" placeholder="" value="'.$value['fecha_nacimiento'].'" name="fecha_nacimiento" required id="fecha_nacimiento">
                      <input type="hidden" name="accion" value="update-medic" id="accion">
                      <input type="hidden" name="id" value="'.$value['id_usuario'].'" id="id">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="update-medic">Guardar</button>
                  </form>

                    

                     	
			    ';
			}
			
		}

		#editar Secretaria
		function editarSecretaria($id){
			$sql = "SELECT * FROM usuarios WHERE id_usuario=".$id." order by id_usuario desc";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo 
			    '
					<form method="post" id="datos-edit-secretary">
					<div class="form-group">
                      <label for="exampleInputEmail1">Usuario</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usuario" placeholder="usuario" value="'.$value['usuario'].'" required id="usuario">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Clave</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="clave" placeholder="clave" value="'.$value['clave'].'" required id="clave">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cedula</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cedula" placeholder="Cedula" value="'.$value['cedula'].'" required id="cedula">
                      
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre" value="'.$value['nombre'].'" name="nombre" required id="nombre">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Apellido</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellido" value="'.$value['apellido'].'" name="apellido" required id="apellido">
                      
                    </div>
                                   
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card shadow h-100 py-2">
                <div class="card-body">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Correo</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" placeholder="Correo" value="'.$value['email'].'" required id="correo">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Celular</label>
                      <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Celular" value="'.$value['telefono'].'" name="celular" required id="celular">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fecha De Nacimiento</label>
                      <input type="date" class="form-control" id="exampleInputPassword1" placeholder="" value="'.$value['fecha_nacimiento'].'" name="fecha_nacimiento" required id="fecha_nacimiento">
                      <input type="hidden" name="accion" value="update-secretary" id="accion">
                      <input type="hidden" name="id" value="'.$value['id_usuario'].'" id="id">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="update-secretary">Guardar</button>
                  </form>

                    

                     	
			    ';
			}
			
		}

		#ver citas
		function verCitas(){
			if ($_SESSION['privilegio']=='3') {
				$sql = "SELECT citas.atendido, citas.estado, citas.id_cita, citas.fecha_cita, citas.hora_cita, pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres_paciente, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombres_medico FROM `citas` LEFT JOIN pacientes ON citas.cedula_paciente = pacientes.cedula_paciente LEFT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.fecha_cita = CURRENT_DATE() and citas.id_medico = ".$_SESSION['id_usuario']." ORDER BY citas.id_cita DESC";
			}
			else if ($_SESSION['privilegio']=='2') {
				$sql = "SELECT citas.atendido, citas.estado, citas.id_cita, citas.fecha_cita, citas.hora_cita, pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres_paciente, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombres_medico FROM `citas` LEFT JOIN pacientes ON citas.cedula_paciente = pacientes.cedula_paciente LEFT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.fecha_cita = CURRENT_DATE() ORDER BY citas.id_cita DESC";
			}
			else if ($_SESSION['privilegio']=='1') {
				$sql = "SELECT citas.atendido, citas.estado, citas.id_cita, citas.fecha_cita, citas.hora_cita, pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres_paciente, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombres_medico FROM `citas` LEFT JOIN pacientes ON citas.cedula_paciente = pacientes.cedula_paciente LEFT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.fecha_cita = CURRENT_DATE() ORDER BY citas.id_cita DESC";
			}
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			echo "
			<div class='table-responsive'>
			<table width='100%' id='table' class='table-striped' style='font-size:14px;'>
               <thead>
               <tr>
				<th>FECHA</th>
				<th>HORA</th>
				<th>CEDULA PACIENTE</th>
				<th>NOMBRE PACIENTE</th>
				<th>MEDICO</th>
				<th>ESTADO</th>
				<th></th>
               </tr>
               </thead>
               <tbody>
			";
			foreach ($consulta as $value) {
				$llamadaReturn = '';
				if ($_SESSION['privilegio']=='3') {
					if ($value['atendido']==0) {
					$estadoColor = "btn-warning";
					$estado = "Llamar Cita";
					$habilite = '';
					$llamada = '<span id="llamando-cita"  class="'.$estadoColor.'">
							<button id="btn-'.$value['id_cita'].'" style="background-color: transparent; outline: none; border:0;" type="button" value="'.$value['id_cita'].'" ><img src="assets/img/iconos/phone-call.png" title="'.$estado.'"/></button> 
					      </span>';
					}
					else if ($value['atendido']==1) {
						$estadoColor = "btn-success";
						$estado = "Poner en espera";
						$habilite = '<span id="atendiendo-cita">
							    <button style="background-color: transparent; outline: none; border:0;" type="button" value="'.$value['id_cita'].'" ><img src="assets/img/iconos/clock.png" title="Atender cita"/></button>
							  </span>';
						$llamada = '<span id="llamando-cita"  class="'.$estadoColor.'">
								<button id="btn-'.$value['id_cita'].'" style="background-color: transparent; outline: none; border:0;" type="button" value="'.$value['id_cita'].'" ><img src="assets/img/iconos/phone-call.png" title="'.$estado.'"/></button> 
						      </span>';
					}
					else if ($value['atendido']==2) {
						$estadoColor = "";
						$estado = "Esta cita ya fue Atendida.";
						$habilite = '';
						$llamada = '<span id=""  class="'.$estadoColor.'">
								<button id="btn-'.$value['id_cita'].'" style="background-color: transparent; outline: none; border:0;" type="button" value="'.$value['id_cita'].'" ><img src="assets/img/iconos/start.png" title="'.$estado.'"/></button> 
						      </span>';
						$llamadaReturn = '<span id="atendiendo-cita"  class="'.$estadoColor.'">
								<button id="btn-'.$value['id_cita'].'" style="background-color: transparent; outline: none; border:0;" type="button" value="'.$value['id_cita'].'" ><img src="assets/img/iconos/phone-call.png" title="Desea volver a llamar esta cita"/></button> 
						      </span>';
					}
						
							$prigivilegiosAltos = $llamada .' '. $habilite.' '.$llamadaReturn.'
										<script>
											document.getElementById("btn_del_'.$value['id_cita'].'").onclick = function(){
													var com = confirm("Deseas Eliminar?");
													if(com){
														location.href = ("models/delete?model=citation&id='.$value['id_cita'].'");
													}
													else{
														
													}
											}
										</script>';
						}
					else if ($_SESSION['privilegio']=='2') {
						
						$prigivilegiosAltos = '<a href="edit-citation?id='.$value['id_cita'].'"><img src="assets/img/iconos/pencil.png" /></a> 
									<a><img src="assets/img/iconos/delete.png" id="btn_del_'.$value['id_cita'].'" /></a>
									<script>
										document.getElementById("btn_del_'.$value['id_cita'].'").onclick = function(){
												var com = confirm("Deseas Eliminar?");
												if(com){
													location.href = ("models/delete?model=citation&id='.$value['id_cita'].'");
												}
												else{
													
												}
										}
									</script>';
					}
					else if ($_SESSION['privilegio']=='1') {
						
						$prigivilegiosAltos = '<a href="edit-citation?id='.$value['id_cita'].'"><img src="assets/img/iconos/pencil.png" /></a> 
									<a><img src="assets/img/iconos/delete.png" id="btn_del_'.$value['id_cita'].'" /></a>
									<script>
										document.getElementById("btn_del_'.$value['id_cita'].'").onclick = function(){
												var com = confirm("Deseas Eliminar?");
												if(com){
													location.href = ("models/delete?model=citation&id='.$value['id_cita'].'");
												}
												else{
													
												}
										}
									</script>';
					}
			    echo 
			    '
					<tr>
                    	<td>'.$value['fecha_cita'].'</td>
						<td>'.$value['hora_cita'].'</td>
						<td>'.$value['cedula_paciente'].'</td>
						<td>'.$value['nombres_paciente'].'</td>
						<td>'.$value['nombres_medico'].'</td>
						<td>'.$value['estado'].'</td>
						<td>
							'.$prigivilegiosAltos.'
						</td>
					</tr>
				';
			}
			echo "</tbody></table></div>";
		}

		#editar citas
		function verCitasForId($id){
			if ($_SESSION['privilegio']=='3') {
				$sql = "SELECT citas.id_medico, citas.estado, citas.id_cita, citas.fecha_cita, citas.hora_cita, pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres_paciente, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombres_medico FROM `citas` LEFT JOIN pacientes ON citas.cedula_paciente = pacientes.cedula_paciente LEFT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.id_cita = ".$id." ORDER BY citas.id_cita DESC";
			}
			else if ($_SESSION['privilegio']=='2') {
				$sql = "SELECT citas.id_medico, citas.estado, citas.id_cita, citas.fecha_cita, citas.hora_cita, pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres_paciente, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombres_medico FROM `citas` LEFT JOIN pacientes ON citas.cedula_paciente = pacientes.cedula_paciente LEFT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.id_cita = ".$id." ORDER BY citas.id_cita DESC";
			}
			else if ($_SESSION['privilegio']=='1') {
				$sql = "SELECT citas.id_medico, citas.estado, citas.id_cita, citas.fecha_cita, citas.hora_cita, pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres_paciente, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombres_medico FROM `citas` LEFT JOIN pacientes ON citas.cedula_paciente = pacientes.cedula_paciente LEFT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.id_cita = ".$id." ORDER BY citas.id_cita DESC";
			}
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			return $consulta;
			
			
		}

		#traer todos los medicos en un select
		function selectMedicos(){

			$sql = "SELECT id_usuario,CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombre_usuario FROM usuarios WHERE privilegio='3' ORDER BY id_usuario DESC";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			echo "
			<select name='medico' id='medico' class='form-control medico'>
			";
			
			foreach ($consulta as $value) {
			    echo 
			    '                
                 <option value="'.$value['id_usuario'].'">'.$value['nombre_usuario'].'</option>  
                     	
			    ';
			}
			echo "
			</select>
			";
		}

		#traer todos los medicos en un select en nueva citacion
		function selectMedicosCitation($id_medico='', $nombre_medico=''){
			$option = '';
			if ($id_medico != '' && $nombre_medico != '') {
				$option = "<option value='".$id_medico."'>".$nombre_medico."</option>";
			}
			else{
				$option = '';
			}
			$sql = "SELECT id_usuario,CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombre_usuario FROM usuarios WHERE privilegio='3' ORDER BY id_usuario DESC";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			echo "
			<select name='medico' id='medico_citation' class='form-control'>
				".$option."
			";
			
			foreach ($consulta as $value) {
			    echo 
			    '                
                 <option value="'.$value['id_usuario'].'">'.$value['nombre_usuario'].'</option>  
                     	
			    ';
			}
			echo "
			</select>
			";
		}

		#traer todos los pacientes en un select
		function selectPacientes($cedula='', $nombres_paciente=''){
			if ($cedula != '' && $nombres_paciente != '') {
				$option = "<option value='".$cedula."'>".$nombres_paciente."</option>";
			}
			else{
				$option = '';
			}
			$sql = "SELECT * FROM pacientes order by id_paciente desc";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			echo "
			<select name='paciente' id='paciente' class='form-control'>
				".$option."
			";
			foreach ($consulta as $value) {
			    echo 
			    '                
                 <option value="'.$value['cedula_paciente'].'">'.$value['nombre_paciente'].' '.$value['apellido_paciente'].'</option>  
                     	
			    ';
			}
			echo "
			</select>
			";
		}

		#contar turnos de hoy
		function countTurnosHoy(){
			$sql = "SELECT count(id_turno)as count FROM turnos WHERE fecha = '".date('Y-m-d')."'";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo $value['count'];
			}
			
		}

		#contar Medicos
		function countMedicos(){
			$sql = "SELECT count(id_usuario)as count FROM usuarios WHERE privilegio='3'";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo $value['count'];
			}
			
		}

		#contar Secretarias
		function countSecretarias(){
			$sql = "SELECT count(id_usuario)as count FROM usuarios WHERE privilegio='2'";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo $value['count'];
			}
			
		}

		#contar Pacientes
		function countPacientes(){
			$sql = "SELECT count(id_paciente)as count FROM pacientes";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo $value['count'];
			}
			
		}

		#contar citas
		function countCitasHoy(){
			$sql = "SELECT count(id_cita)as count FROM citas WHERE fecha_cita = '".date('Y-m-d')."'";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo $value['count'];
			}
			
		}

		#contar citas de medico para hoy
		function countCitasMedicoHoy(){
			$sql = "SELECT count(id_cita)as count FROM citas WHERE fecha_cita = '".date('Y-m-d')."' AND id_medico=".$_SESSION['id_usuario'];
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo $value['count'];
			}
			
		}


	}
?>
