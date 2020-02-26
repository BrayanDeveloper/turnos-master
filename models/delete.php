<?php 
	session_start();
	require '../controllers/conexion.php';
	/**
	 * 
	 */
	
	switch ($_GET['model']) {
		
			case 'business':
			
			$sql = "DELETE FROM empresas WHERE id_empresa=".$_GET['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			
				echo "<script>
						alert('Se Elimino Correctamente');
						location.href = '../business';
					  </script>";
			
			break;

			#eliminar Paciente
			case 'patient':
			
			$sql = "DELETE FROM pacientes WHERE id_paciente=".$_GET['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			
				echo "<script>
						alert('Se Elimino Correctamente');
						location.href = '../patients';
					  </script>";
			
			break;

			#eliminar medico
			case 'medic':
			
			$sql = "DELETE FROM usuarios WHERE id_usuario=".$_GET['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			
				echo "<script>
						alert('Se Elimino Correctamente');
						location.href = '../user-medic';
					  </script>";
			
			break;

			#eliminar secretaria
			case 'secretary':
			
			$sql = "DELETE FROM usuarios WHERE id_usuario=".$_GET['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			
				echo "<script>
						alert('Se Elimino Correctamente');
						location.href = '../user-secretary';
					  </script>";
			
			break;
			
			#eliminar Cita
			case 'citation':
			$sql = "DELETE FROM citas WHERE id_cita=".$_GET['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			
				echo "<script>
						alert('Se Elimino Correctamente');
						location.href = '../citation';
					  </script>";
			
			break;
	}

?>