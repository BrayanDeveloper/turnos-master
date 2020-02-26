<?php 
	session_start();
	require '../controllers/conexion.php';
	/**
	 * 
	 */
	
	switch ($_POST['accion']) {

			#vista disponibilida de medico
			case 'new-citation':

				$sql = "SELECT * FROM citas WHERE id_medico = ".$_POST['medico']." AND fecha_cita = NOW()";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql)->fetchAll();
				    
					echo "
					<div class='table-responsive'>
					<table border='1' width='100%'>
					<thead>
					<tr>
						<th>Medico</th>
						<th>Hora</th>
						<th>Fecha</th>
					</tr>
					</thead>
					<tbody>

					";
					foreach ($consulta as $value) {
					    echo "
					    <tr>
					    <td>".$value['_cita']."</td>
						<td>".$value['hora_cita']."</td>
						<td>".$value['fecha_cita']."</td>

						</tr>
						
					    ";
					}
					echo "
					</tbody>
					</table>
					</div>
					";
				
				break;

			#Editar turno secretaria, atendiendo a un paciente
			
			case 'turn-attended-secretary':
			
			$sql = "SELECT pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres FROM `turnos` LEFT JOIN pacientes ON turnos.cedula = pacientes.cedula_paciente WHERE turnos.id_turno = ".$_POST['dato'].";";
			
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			$id_paciente = 0;
			$nombre_paciente = "";
			if($consulta){
				foreach ($consulta as $key) {
					$id_paciente = $key['cedula_paciente'];
					$nombre_paciente = $key['nombres'];
				}

			}
				
				echo "<script>
						location.href = 'new-citation-turn?id=".$id_paciente."&nombre=".$nombre_paciente."&id_turno=".@$_POST['dato']."';
					  </script>";
			
			break;
      
      
      case 'turno_publico':

			
			$sql = "SELECT turnos.sonido, usuarios.n_modulo, turnos.turno FROM turnos RIGHT JOIN usuarios ON turnos.id_usuario = usuarios.id_usuario WHERE fecha = CURRENT_DATE() AND atendido = 1 AND usuarios.estado_modulo = 1 ORDER BY id_turno DESC";
			
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			if($consulta){
				
					echo "
					<div class='table-responsive'>
					<table class='table table-bordered' style='margin-top: 40px;'>
  						<thead>
  						<tr>
    						<th scope='col' class='text-aling:center'>Turno</th>
    						<th scope='col'>Módulo</th>
    						<th scope='col'></th>
    					</tr>
  						</thead>
  						<tbody>
    					";
    					foreach ($consulta as $key) {
							$turno = $key['turno'];
							$modulo = $key['n_modulo'];
							$sonido = $key['sonido'];
						echo"

    						<tr value=".$turno.">
      							<td>".$turno."</td>
      							<td>".$modulo."</td>
      							<td>
      								
      							</td>
    						</tr>
    					";
    					break;
    				    }
    					echo"
    					</tbody>
					</table>
					</div>
					";
			}
			
			break;

			case 'new-citation-turn':
				$campos_date = '
				<input type="date" name="date" class="form-control" id="date">
				<input type="time" name="time" class="form-control" id="time">';

				$sql = "SELECT CONCAT(usuarios.nombre, ' ' ,usuarios.apellido) AS nombre_medico, citas.* FROM citas RIGHT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.id_medico = ".$_POST['id_medico']." AND citas.fecha_cita = CURRENT_DATE() order by hora_cita DESC";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql)->fetchAll();
				if($consulta){
					foreach ($consulta as $val) {
					    echo "
					    <div class='table-responsive'>
						<legend><span style='font-style: italic;color:red;'>Médico: </span> <span style='text-transform: capitalize;'>".$val['nombre_medico']."</span><legend>
						<table width='100%' class='table table-bordered'> 
						<thead class='thead-dark'>
						<tr>
							<th style='font-size:14px;'>HORA</th>
							<th style='font-size:14px;'>FECHA</th>
							<th style='font-size:14px;'>CEDULA PACIENTE</th>

						</tr>
						</thead>
						<tbody class='thead-light'>
						";
						break;
					}
					foreach ($consulta as $value) {
					    echo "
						<tr>
							<td style='font-size:14px;'>".$value['hora_cita']."</td>
							<td style='font-size:14px;'>".$value['fecha_cita']."</td>
							<td style='font-size:14px;'>".$value['cedula_paciente']."</td>

						</tr>
					    ";
					}
					echo "
					</tbody>
					</table>
					</div>
					<br>
						<a id='add-fh' class='btn btn-success text-light'>Agregar Cita fecha y hora</a>

						<a id='see-cf' class='btn btn-warning text-light'>Ver Citas por otra fecha</a>
						<script>
			              
			              $('#add-fh').click(function(){
			              	$('#campos_date').slideToggle();
			                });

			                $('#see-cf').click(function(){
			                	
								$('#campos_citas_otra_f').slideToggle();
			                }); 

			                $('#medico').change(function(){
			                	$('#campos_citas_otra_f').hide();
			                    $('#res').empty();
			                });	 
						
						</script>			

					";
				}
				else
				{
					echo "Este medico no tiene citas para hoy";
					echo "
					<br>
						<a id='add-fh' class='btn btn-success text-light'>Agregar Cita fecha y hora</a>

						<a id='see-cf' class='btn btn-warning text-light'>Ver Citas por otra fecha</a>
						<script>
			              
			              $('#add-fh').click(function(){
			              		$('#campos_date').slideToggle();
			              });

			                $('#see-cf').click(function(){
			                	$('#campos_citas_otra_f').slideToggle();
			                });

			                $('#medico').change(function(){
			                	$('#campos_citas_otra_f').hide();
			                    $('#res').empty();
			                });						
						</script>			
					";
				}
				break;
				

				#visualizacion de busqueda de citas por medico y fecha definida por usuario
				case 'searh-date-citation':
				

				$sql = "SELECT CONCAT(usuarios.nombre, ' ' ,usuarios.apellido) AS nombre_medico, citas.* FROM citas RIGHT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.id_medico = ".$_POST['medico']." AND citas.fecha_cita = '".$_POST['date_searh']."' order by hora_cita DESC";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql)->fetchAll();
				if($consulta){
					foreach ($consulta as $val) {
					    echo "
					    <div class='table-responsive'>
						<legend><span style='font-style: italic;color:red;'>Médico: </span> <span style='text-transform: capitalize;'>".$val['nombre_medico']."</span><legend>
						<table width='100%' class='table table-bordered'> 
						<thead class='thead-dark'>
						<tr>
							<th style='font-size:14px;'>HORA</th>
							<th style='font-size:14px;'>FECHA</th>
							<th style='font-size:14px;'>CEDULA PACIENTE</th>

						</tr>
						</thead>
						<tbody class='thead-light'>
						";
						break;
					}
					foreach ($consulta as $value) {
					    echo "
						<tr>
							<td style='font-size:14px;'>".$value['hora_cita']."</td>
							<td style='font-size:14px;'>".$value['fecha_cita']."</td>
							<td style='font-size:14px;'>".$value['cedula_paciente']."</td>

						</tr>
					    ";
					}
					echo "
					</tbody>
					</table>
					</div>
					<br>
					";
				}
				else
				{
					echo "Este medico no tiene citas para La fecha Seleccionada.";
					
				}
				break;

				case 'filtro_fecha_citation':
					if ($_SESSION['privilegio']=='3') {
							$sql = "SELECT citas.estado, citas.id_cita, citas.fecha_cita, citas.hora_cita, pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres_paciente, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombres_medico FROM `citas` LEFT JOIN pacientes ON citas.cedula_paciente = pacientes.cedula_paciente LEFT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.fecha_cita = '".$_POST['date']."' and citas.id_medico = ".$_SESSION['id_usuario']." ORDER BY citas.id_cita DESC";
						}
						else if ($_SESSION['privilegio']=='2') {
							$sql = "SELECT citas.estado, citas.id_cita, citas.fecha_cita, citas.hora_cita, pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres_paciente, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombres_medico FROM `citas` LEFT JOIN pacientes ON citas.cedula_paciente = pacientes.cedula_paciente LEFT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.fecha_cita = '".$_POST['date']."' ORDER BY citas.id_cita DESC";
						}
						else if ($_SESSION['privilegio']=='1') {
							$sql = "SELECT citas.estado, citas.id_cita, citas.fecha_cita, citas.hora_cita, pacientes.cedula_paciente, CONCAT(pacientes.nombre_paciente, ' ',pacientes.apellido_paciente) AS nombres_paciente, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombres_medico FROM `citas` LEFT JOIN pacientes ON citas.cedula_paciente = pacientes.cedula_paciente LEFT JOIN usuarios ON citas.id_medico = usuarios.id_usuario WHERE citas.fecha_cita = '".$_POST['date']."' ORDER BY citas.id_cita DESC";
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
							<a href="edit-citation?id='.$value['id_cita'].'"><img src="assets/img/iconos/pencil.png" /></a> 
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
							</script>
						</td>
								</tr>
							';
						}
						echo "</tbody></table></div>";
					break;
  

	}

?>

