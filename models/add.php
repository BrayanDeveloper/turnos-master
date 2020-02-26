<?php 
	session_start();
	require '../controllers/conexion.php';
	/**
	 * 
	 */
	
	switch ($_POST['accion']) {

			#nuevo paciente
			case 'new-patient':
			
			$sql = "INSERT INTO pacientes(cedula_paciente,nombre_paciente,apellido_paciente,correo_paciente,celular_paciente,fecha_nacimiento,id_usuario)VALUES('".$_POST['cedula']."','".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['correo']."','".$_POST['celular']."','".$_POST['fecha_nacimiento']."',".$_SESSION['id_usuario']."); ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			
				echo "<script>
						alert('Se Creo el nuevo paciente Correctamente');
						location.href = 'patients';
					  </script>";
			
			break;

			#nuevo turno
			case 'new-turn':
						
						$sql = "SELECT * FROM `pacientes` WHERE `id_paciente` = (SELECT `id_paciente` FROM pacientes WHERE cedula_paciente = '".$_POST['cedulaTurno']."');";
						
			            @$statement = Conexion::Conectar();
						$consulta = $statement->query($sql)->fetchAll();
						if($consulta){
							$fecha = date('Y-m-d');
							$sql2 = "SELECT COUNT(id_turno) AS turnosP FROM `turnos` WHERE `fecha` = '".$fecha."'";
							$consulta2 = $statement->query($sql2)->fetchAll();
							if($consulta2){
								foreach ($consulta2 as $key) {
									$turnoActual = $key['turnosP']+1;
									
									echo '<div class="modal fade" tabindex="-1" role="dialog" id="modal">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title"> </h4>
										      </div>
										      <div class="modal-body">
										        <p>Su Cedula: '.$_POST['cedulaTurno'].' y su Turno es: <strong class="btn-success btn">'.$turnoActual.'</strong></p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
										        
										      </div>
										    </div><!-- /.modal-content -->
										  </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->';
									$sql3= "INSERT INTO `turnos`(`cedula`, `fecha`, `hora_llamada`, `turno`, `hora_atendido`,atendido) VALUES (?,?,?,?,?,?)";
										$hora = date('H:i:s');
										$insertTurno = Conexion::Conectar();
										$nuevoTurno = $insertTurno->prepare($sql3);
										$nuevoTurno->execute(array($_POST['cedulaTurno'],$fecha,$hora,$turnoActual,"00:00:00",0));
										// echo "SU TURNO ES: ".$turnoActual;
										echo "<script>
									    	$('#cedulaTurno').val('');
											$('#modal').modal('show');
										</script>
									";
								}
								
							}
							else{
								$turnoActual =1;
									echo "<script>
									    $('#sacando-turno').prop('disabled', true);
										setTimeout(function(){ location.href='digitador'; }, 5000);
										</script>";
									echo "<p><a href='#ex1' rel='modal:open'>SU TURNO ES:  ".$turnoActual."</a></p>";
									$sql3= "INSERT INTO `turnos`(`cedula`, `fecha`, `hora_llamada`, `turno`, `hora_atendido`, atendido) VALUES (?,?,?,?,?,?)";
										$hora = date('H:i:s');
										$insertTurno = Conexion::Conectar();
										$nuevoTurno = $insertTurno->prepare($sql3);
										$nuevoTurno->execute(array($_POST['cedulaTurno'],$fecha,$hora,$turnoActual,"00:00:00",0));
								}
							
						}
						else{
							echo "Usted no está registrado";
						}
							
							
							break;


				#nuevo medico
				case 'new-medic':

				$sql="INSERT INTO `usuarios`(`usuario`, `email`, `nombre`, `apellido`, `cedula`, `fecha_nacimiento`, `rol`, `privilegio`, `clave`, `telefono`,`id_user_admin`) VALUES('".$_POST['usuario']."','".$_POST['correo']."','".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['cedula']."','".$_POST['fecha_nacimiento']."','admin','3','".$_POST['clave']."','".$_POST['celular']."',".$_SESSION['id_usuario'].");";

				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);
				if($consulta){
					echo "<script>
							alert('Se Creo el nuevo Medico Correctamente');
							location.href = 'user-medic';
						  </script>";
					}
				
				break;


				#nueva Secretaria
				case 'new-secretary':
			
				$sql = "INSERT INTO usuarios(rol,clave,privilegio,usuario,cedula,nombre,apellido,email,telefono,fecha_nacimiento,id_user_admin)VALUES('admin','".$_POST['clave']."','2','".$_POST['usuario']."','".$_POST['cedula']."','".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['correo']."','".$_POST['celular']."','".$_POST['fecha_nacimiento']."',".$_SESSION['id_usuario']."); ";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);
				
					echo "<script>
							alert('Se Creo Correctamente');
							location.href = 'user-secretary';
						  </script>";
				
				break;

				#nueva cita Asignada al medico
				case 'hide-new-citation-turn':
			
				$sql = "INSERT INTO citas(cedula_paciente,fecha_cita,hora_cita,id_medico,fecha_registro_cita,estado)VALUES('".$_POST['paciente']."','".$_POST['date']."','".$_POST['time']."', ".$_POST['medico'].",CURRENT_DATE(),'interna'); ";
				//var_dump($sql);
				
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);
				
				if($consulta){
					$sqlUpdate = "UPDATE turnos SET hora_atendido = CURTIME(), atendido = 2 WHERE id_turno =".$_POST['id_turno']."; ";
					@$statementUpdate = Conexion::Conectar();
					$consultaUpdate = $statementUpdate->query($sqlUpdate);

					echo "Cita Asignada.";
					echo "<script>
							alert('Se Creo Correctamente');
							location.href = 'turn-secretary';
							
						  </script>";
				}
				else{
					echo "<script>
							alert('No se Creo');
							location.href = 'new-citation-turn?id=".$_POST['paciente']."&nombre=".$_POST['nombre_paciente']."';
						  </script>";
				}
				
				
				break;

				#nueva cita Asignada al medico y al paciente
				case 'new-citation':
			
				$sql = "INSERT INTO citas(cedula_paciente,fecha_cita,hora_cita,id_medico,fecha_registro_cita,estado)VALUES('".$_POST['paciente']."','".$_POST['fecha']."','".$_POST['hora']."', ".$_POST['medico'].",CURRENT_DATE(), 'externa'); ";
				//var_dump($sql);
				
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);
				// $id_insert = $consulta->lastInsertId();
				
				if ($consulta) {
					echo "
						<script>
						alert('Cita Creada con Exito');
						location.href = 'citation';
						</script>


					";
				}
				
				
				
				break;

			
		
	}

?>

