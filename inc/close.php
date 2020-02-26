<?php 
	require '../controllers/funciones.php';
	$funciones = new Funciones();
	$funciones->closeLogs();

	if ($_SESSION['privilegio']=='2') {
		#consulta
		$sql = "UPDATE usuarios SET n_modulo = '0', estado_modulo = 0 WHERE id_usuario = ".$_SESSION['id_usuario']."; ";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);

	}
	else if ($_SESSION['privilegio']=='3') {
		#consulta
		$sql = "UPDATE usuarios SET n_consultorio = 0 WHERE id_usuario = ".$_SESSION['id_usuario']."; ";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);

	}

	session_destroy(); 
	header('location: ../index');


	

?>