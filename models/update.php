<?php 
	session_start();
	require '../controllers/conexion.php';
	/**
	 * 
	 */
	
	switch ($_POST['accion']) {
		case 'update_profile':
			$sql = "UPDATE usuarios SET usuario = '".$_POST['usuario']."', nombre = '".$_POST['nombre']."', clave = '".$_POST['clave']."', telefono='".$_POST['telefono']."', email='".$_POST['email']."'  WHERE id_usuario = ".$_SESSION['id_usuario']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			foreach ($consulta as $key) {
			    $_SESSION['id_usuario'] = $key['id_usuario'];
			    $_SESSION['usuario'] = $key['usuario'];
			    // $_SESSION['email'] = $key['email'];
			    $_SESSION['nombre'] = $key['nombre'];
			    $_SESSION['telefono'] = $key['telefono'];
			    $_SESSION['email'] = $key['email'];
			    $_SESSION['pass'] = $key['clave'];
			    $_SESSION['imagen_profile'] = $key['imagen_profile'];
			}
		
				echo "<script>
						alert('Se ha actualizado Correctamente. Se Cerrara la sesion, porfavor vuelve a entrar');
						location.href = '../inc/close';
					  </script>";
			
			break;

			case 'update_photo_profile':
			$imagen = $_FILES['foto']['tmp_name'];
			$imagen_name = $_FILES['foto']['name'];
			$destino = "../assets/img/profile/".$imagen_name;

			$sql = "UPDATE usuarios SET imagen_profile = '".$imagen_name."' WHERE id_usuario = ".$_SESSION['id_usuario']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			foreach ($consulta as $key) {
			    $_SESSION['id_usuario'] = $key['id_usuario'];
			    $_SESSION['usuario'] = $key['usuario'];
			    $_SESSION['email'] = $key['email'];
			    $_SESSION['nombre'] = $key['nombre'];
			    $_SESSION['pass'] = $key['clave'];
			    $_SESSION['imagen_profile'] = $key['imagen_profile'];
			}
			move_uploaded_file($imagen, $destino);
				echo "<script>
						alert('Se Actualizo Correctamente, la sesion se Cerrara, porfavor vuelve a entrar');
						location.href = '../inc/close';
					  </script>";
			
			break;

			#actualizar datos de pacientes 
			case 'update-patient':
			$sql = "UPDATE pacientes SET cedula_paciente = '".$_POST['cedula']."', nombre_paciente = '".$_POST['nombre']."', apellido_paciente = '".$_POST['apellido']."', correo_paciente='".$_POST['correo']."', celular_paciente='".$_POST['celular']."', fecha_nacimiento='".$_POST['fecha_nacimiento']."'  WHERE id_paciente = ".$_POST['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
		
				echo "<script>
						alert('Se ha actualizado Correctamente.');
						location.href = ('patients');
					  </script>";
			
			break;

			#editar Medico 
			case 'update-medic':
			$sql = "UPDATE usuarios SET usuario = '".$_POST['usuario']."', clave = '".$_POST['clave']."', cedula = '".$_POST['cedula']."', nombre = '".$_POST['nombre']."', apellido = '".$_POST['apellido']."', email='".$_POST['correo']."', telefono='".$_POST['celular']."', fecha_nacimiento='".$_POST['fecha_nacimiento']."'  WHERE id_usuario = ".$_POST['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			if($consulta){
				echo "<script>
						alert('Se ha actualizado Correctamente.');
						location.href = ('user-medic');
					  </script>";
			}
			break;


			#editar secretaria 
			case 'update-secretary':
			$sql = "UPDATE usuarios SET usuario = '".$_POST['usuario']."', clave = '".$_POST['clave']."', cedula = '".$_POST['cedula']."', nombre = '".$_POST['nombre']."', apellido = '".$_POST['apellido']."', email='".$_POST['correo']."', telefono='".$_POST['celular']."', fecha_nacimiento='".$_POST['fecha_nacimiento']."'  WHERE id_usuario = ".$_POST['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
		
				echo "<script>
						alert('Se ha actualizado Correctamente.');
						location.href = ('user-secretary');
					  </script>";
			
			break;


			#Editar turno secretaria, llamando paciente
			case 'turn-call-secretary':
			
			$sql = "SELECT atendido FROM turnos WHERE id_turno = ".$_POST['dato']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			$random = rand(1,3);
			if ($random == 1) {
				$color = '#31E078';
			}
			else if ($random == 2) {
				$color = '#4ABED8';
			}
			else if ($random == 3) {
				$color = '#D8774A';
			}
			foreach ($consulta as $key) {
				if($key['atendido'] == 0){
					$sql2= "UPDATE turnos SET hora_llamada = curTime(), atendido = 1, id_usuario = ".$_SESSION['id_usuario'].", sonido = '".$_POST['sonido']."', color_aviso = '".$color."' WHERE id_turno = ".$_POST['dato']."; ";
					$consulta = $statement->query($sql2);

					echo "

 						Se ha llamado

					";
					echo "
					<script>
						$('#success').addClass('btn-success').removeClass('btn-warning');
						location.href = 'turn-secretary';
					</script>
					";
			    }
			    else{
			    	$sql2= "UPDATE turnos SET hora_llamada = curTime(), atendido = 0 WHERE id_turno = ".$_POST['dato']."; ";
					$consulta = $statement->query($sql2);
					echo "
					     Se ha puesto en espera
					";
					echo "
					<script>
						$('#success').addClass('btn-warning').removeClass('btn-success');
						location.href = 'turn-secretary';
					</script>
					";
			    }
			}
			break;

			#Editar citas
			case 'update-citation':
			
			$sql = "UPDATE citas SET cedula_paciente = '".$_POST['paciente']."', id_medico = ".$_POST['medico'].", fecha_cita = '".$_POST['fecha']."', hora_cita = '".$_POST['hora']."' WHERE id_cita = ".$_POST['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);

			if ($consulta) {
				echo "Cita Actualizada.";
			}
			break;

			#Editar numero de modulo desde inicio de sesion por la secretaria
			case 'update_modulo':
			$consulta = "SELECT * FROM usuarios WHERE n_modulo = ".@$_POST['n_modulo']." AND id_usuario = ".$_SESSION['id_usuario'];
			@$statementConsulta = Conexion::Conectar();
			$consultaConsulta = $statementConsulta->query($consulta);
			$countRowsConsulta = $consultaConsulta->rowCount();
			if ($countRowsConsulta) {
				echo '
				<script>
					alert("Usted Ya tiene una session previamente Activa en el Modulo: '.$_POST['n_modulo'].', lo redigiremos a su Session.");
					location.href = "admin";
				</script>
				';	
			}


			else
			{
				$select = "SELECT * FROM usuarios WHERE n_modulo = ".@$_POST['n_modulo'].";";
			@$statementSelect = Conexion::Conectar();
			$consultaSelect = $statementSelect->query($select);
			$countRows = $consultaSelect->rowCount();

			if ($countRows > 0) {
				echo '
				<script>
					alert("El numero de modulo ya se Encuentra ocupado, puedes Volver a Ingresar.");
					location.href = "login";
				</script>
				';
			}
			else
			{
				$sql = "UPDATE usuarios SET n_modulo = '".$_POST['n_modulo']."', estado_modulo = 1 WHERE id_usuario = ".$_SESSION['id_usuario']."; ";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);

				if ($consulta) {
					echo '<img src="assets/img/iconos/loader.gif"/>';
					echo "
					<script>
					alert('Bienvenido Secretaria: ". @$_SESSION['usuario'] ."');
					location.href = 'admin';
					</script>
					";
					// echo "
					// <script>
					// 	alert('Bienvenido: ". @$_SESSION['usuario'] ."');
					// 	location.href = 'admin';
					// </script>
					// ";
				}
			}
			}


			
			break;

			#Editar numero de consultorio desde inicio de sesion por el medico
			case 'update_consultorio':
			$consulta = "SELECT * FROM usuarios WHERE n_consultorio = ".@$_POST['n_modulo']." AND id_usuario = ".$_SESSION['id_usuario'];
			@$statementConsulta = Conexion::Conectar();
			$consultaConsulta = $statementConsulta->query($consulta);
			$countRowsConsulta = $consultaConsulta->rowCount();
			if ($countRowsConsulta) {
				echo '
				<script>
					alert("Usted Ya tiene una session previamente Activa en el Consultorio: '.$_POST['n_modulo'].', lo redigiremos a su Session.");
					location.href = "admin";
				</script>
				';	
			}
			else
			{
					$select = "SELECT * FROM usuarios WHERE n_consultorio = ".@$_POST['n_modulo'].";";
					@$statementSelect = Conexion::Conectar();
					$consultaSelect = $statementSelect->query($select);
					$countRows = $consultaSelect->rowCount();

					if ($countRows > 0) {
						echo '
						<script>
							alert("El numero del Consultorio ya se Encuentra ocupado, puedes Volver a Ingresar.");
							location.href = "login";
						</script>
						';
					}
					else
					{
						$sql = "UPDATE usuarios SET n_consultorio = '".$_POST['n_modulo']."' WHERE id_usuario = ".$_SESSION['id_usuario']."; ";
						@$statement = Conexion::Conectar();
						$consulta = $statement->query($sql);

						if ($consulta) {
							echo '<img src="assets/img/iconos/loader.gif"/>';
							echo "
							<script>
							alert('Bienvenido Medico: ". @$_SESSION['usuario'] ."');
							location.href = 'admin';
							</script>
							";
							// echo "
							// <script>
							// 	alert('Bienvenido: ". @$_SESSION['usuario'] ."');
							// 	location.href = 'admin';
							// </script>
							// ";
						}
					}
			}


			break;

			#Llamar cita
			case 'llamando-cita':
			
			$sql = "SELECT atendido FROM citas WHERE id_cita = ".$_POST['dato']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();

			$random = rand(1,3);
			if ($random == 1) {
				$color = '#31E078';
			}
			else if ($random == 2) {
				$color = '#4ABED8';
			}
			else if ($random == 3) {
				$color = '#D8774A';
			}
			foreach ($consulta as $key) {
				if($key['atendido'] == 0){
					$sql2= "UPDATE citas SET hora_llamada = curTime(), atendido = 1, id_usuario_medic = ".$_SESSION['id_usuario'].", color_aviso = '".$color."'  WHERE id_cita = ".$_POST['dato']."; ";
					$consulta = $statement->query($sql2);

					echo "

 						Se ha llamado

					";
					echo "
					<script>
						$('#success').addClass('btn-success').removeClass('btn-warning');
						location.href = 'citation';
					</script>
					";
			    }
			    else{
			    	$sql2= "UPDATE citas SET hora_llamada = '00:00:00', atendido = 0, id_usuario_medic = 0 WHERE id_cita = ".$_POST['dato']."; ";
					$consulta = $statement->query($sql2);
					echo "
					     Se ha puesto en espera
					";
					echo "
					<script>
						$('#success').addClass('btn-warning').removeClass('btn-success');
						location.href = 'citation';
					</script>
					";
			    }
			}
			break;

			#atendiendo cita
			case 'atendiendo-cita':
			
			$sql = "SELECT atendido FROM citas WHERE id_cita = ".$_POST['dato']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			foreach ($consulta as $key) {
				if($key['atendido'] == 1){
					$sql2= "UPDATE citas SET hora_llamada = curTime(), atendido = 2, id_usuario_medic = ".$_SESSION['id_usuario']."  WHERE id_cita = ".$_POST['dato']."; ";
					$consulta = $statement->query($sql2);

					echo "

 						Se ha atendido Satisfactoriamente.

					";
					echo "
					<script>
						$('#success').addClass('btn-success').removeClass('btn-warning');
						location.href = 'citation';
					</script>
					";
			    }
			    else if($key['atendido'] == 2){
			    	$sql2= "UPDATE citas SET hora_llamada = curTime(), atendido = 1, id_usuario_medic = ".$_SESSION['id_usuario']." WHERE id_cita = ".$_POST['dato']."; ";
					$consulta = $statement->query($sql2);
					echo "
					     Se ha Llamado
					";
					echo "
					<script>
						$('#success').addClass('btn-warning').removeClass('btn-success');
						location.href = 'citation';
					</script>
					";
			    }
			}
			break;

	}

?>