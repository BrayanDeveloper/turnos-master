<?php 

	/**
	 * 
	 */
	class Conexion
	{
		
		function Conectar(){
			$host = "mysql:dbname=digiturno_db; host=localhost;";
			$user = "root";
			$pass = "";

			try {
				$pdo = new PDO($host, $user, $pass);
				//echo "<script>console.log('conexion de base exitosa');</script>";
				return $pdo;

			} catch (Exception $e) {
				$e->getMessage();
			}
		}

	}

?>