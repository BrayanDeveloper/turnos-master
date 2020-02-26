<?php 
	session_start();
	require '../controllers/conexion.php';
	/**
	 * 
	 */
	
	switch ($_POST['accion']) {
		
			case 'report_day':

			#consulta de conteo de recaudos hechos en el dia
			$sqlRecaudo = "SELECT count(id_recaudo)as countRecaudos FROM recaudos WHERE empresa = '".$_POST['empresa']."' and tipo='recaudo' and fecha_recaudo = '".$_POST['fecha']."' and id_usuario = ".$_POST['caja']."";
			@$statement = Conexion::Conectar();
			$consultaRecaudo = $statement->query($sqlRecaudo)->fetchAll();

			foreach ($consultaRecaudo as $r) {
			    $recaudos = $r['countRecaudos'];
			}

			#consulta de conteo de pagos hechos en el dia
			$sqlPago = "SELECT count(id_recaudo)as countPagos FROM recaudos WHERE empresa = '".$_POST['empresa']."' and tipo='pago' and fecha_recaudo = '".$_POST['fecha']."' and id_usuario = ".$_POST['caja']."";
			@$statement = Conexion::Conectar();
			$consultaPago = $statement->query($sqlPago)->fetchAll();

			foreach ($consultaPago as $p) {
			    $pagos = $p['countPagos'];
			}


			$sql = "SELECT count(id_recaudo)as countRecaudos, count(id_recaudo)as countPagos, sum(total_pago)as sumatoria_total_pago, sum(total_recaudo)as sumatoria_total_recaudo, empresa FROM recaudos WHERE empresa = '".$_POST['empresa']."' and fecha_recaudo = '".$_POST['fecha']."' and id_usuario = ".$_POST['caja']."";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
					echo "<p>Reporte por Dia: ".$_POST['fecha']."</p>";
					echo 
					"
					<table width='100%' border='1'>
					";
				foreach ($consulta as $value) {
				    echo 
				    "
				    <tr>
				    	<th>Empresa:</th>
				    	<td>".$value['empresa']."</td>
				    </tr>
				    <tr>
				    	<th>Recaudos hechos:</th>
				    	<td> ".$recaudos." </td>
				    </tr>
				    <tr>
				    	<th>total Recaudado:</th>
				    	<td>".number_format($value['sumatoria_total_recaudo'])." $</td>
				    </tr>
				    <tr>
				    	<th>Pagos hechos:</th>
				    	<td> ".$pagos." </td>
				    </tr>
				    <tr>
				    	<th>total pagado:</th>
				    	<td>".number_format($value['sumatoria_total_pago'])." $</td>
				    </tr>

				    <tr>
				    	<th>total Caja:</th>
				    	<td><strong style='color:red;'></strong> ".number_format(($value['sumatoria_total_recaudo'] - $value['sumatoria_total_pago']))." $</td>
				    </tr>
				    
				    ";
				}
				echo 
					"
					</table>
					";
					echo "<a class='btn btn-success' href='reports-day?export_data=true&fecha=".$_POST['fecha']."&caja=".$_POST['caja']."&empresa=".$_POST['empresa']."'><img src='assets/img/excel.png' title='Exportar a Excel'/></a>";
					echo "<a class='btn btn-warning' href='report-imp-day?export_data=true&fecha=".$_POST['fecha']."&caja=".$_POST['caja']."&empresa=".$_POST['empresa']."' target='_blank'><img src='assets/img/imp.png' title='Imprimir'/></a>";
					// echo "<a class='btn btn-danger' href='report-day-pdf?fecha=".$_POST['fecha']."&caja=".$_POST['caja']."&empresa=".$_POST['empresa']."' target='_blank'><img src='assets/img/pdf.png' title='Exportar a PDF'/></a>";
			break;


			#reporte por mes
			case 'report_mes':
			
			$sql = "SELECT sum(total_pago)as sumatoria_total_pago, sum(total_recaudo)as sumatoria_total_recaudo, empresa FROM recaudos WHERE empresa = '".$_POST['empresa']."' and fecha_recaudo >= '".$_POST['fecha_init']."' and fecha_recaudo <= '".$_POST['fecha_end']."' and id_usuario = ".$_POST['caja']."";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
					echo "<p>Reporte por mes: ".$_POST['fecha_init']." hasta ".$_POST['fecha_end']."</p>";
					echo 
					"
					<table width='100%' border='1'>
					";
				foreach ($consulta as $value) {
				    echo 
				    "
				    <tr>
				    	<th>Empresa:</th>
				    	<td>".$value['empresa']."</td>
				    </tr>
				    <tr>
				    	<th>total en el Mes resibido:</th>
				    	<td>".number_format($value['sumatoria_total_recaudo'])." $</td>
				    </tr>
				    <tr>
				    	<th>total Pagos en el Mes:</th>
				    	<td>".number_format($value['sumatoria_total_pago'])." $</td>
				    </tr>
				    <tr>
				    	<th>total Caja:</th>
				    	<td><strong style='color:red;'></strong> ".number_format(($value['sumatoria_total_recaudo'] - $value['sumatoria_total_pago']))." $</td>
				    </tr>
				    
				    ";
				}
				echo 
					"
					</table>
					";
					echo "<a class='btn btn-success' href='export-report-week-report?export_data=true&fecha_init=".$_POST['fecha_init']."&fecha_end=".$_POST['fecha_end']."&caja=".$_POST['caja']."&empresa=".$_POST['empresa']."'><img src='assets/img/excel.png' title='Exportar a Excel'/></a> <a class='btn btn-warning' href='exporte-mes-detallado?export_data=true&fecha_init=".$_POST['fecha_init']."&fecha_end=".$_POST['fecha_end']."&caja=".$_POST['caja']."&empresa=".$_POST['empresa']."' target='_blank'><img src='assets/img/imp.png' title='Imprimir'/></a>";
					// echo "<a class='btn btn-danger' href='report-week-pdf?fecha_init=".$_POST['fecha_init']."&fecha_end=".$_POST['fecha_end']."&caja=".$_POST['caja']."&empresa=".$_POST['empresa']."' target='_blank'><img src='assets/img/pdf.png' title='Exportar a PDF'/></a>";
			break;

			case 'cierre_caja_individual':
			$fecha = date('Y-m-d');
			$sql = "SELECT sum(total_pago)as sumatoria_total_pago, sum(total_recaudo)as sumatoria_total_recaudo, empresa FROM recaudos WHERE empresa = '".$_POST['empresa']."' and fecha_recaudo = '".$fecha."' and id_usuario = ".$_POST['caja']."";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
					echo "<p>Reporte por Dia: ".$fecha."</p>";
					echo 
					"
					<table width='100%' border='1'>
					";
				foreach ($consulta as $value) {
				    echo 
				    "
				    <tr>
				    	<th>Empresa:</th>
				    	<td>".$value['empresa']."</td>
				    </tr>
				    <tr>
				    	<th>total Resibido en el dia:</th>
				    	<td>".number_format($value['sumatoria_total_recaudo'])." $</td>
				    </tr>
				    <tr>
				    	<th>total pagos:</th>
				    	<td>".number_format($value['sumatoria_total_pago'])." $</td>
				    </tr>
				    <tr>
				    	<th>total Caja:</th>
				    	<td><strong style='color:red;'></strong> ".number_format(($value['sumatoria_total_recaudo'] - $value['sumatoria_total_pago']))." $</td>
				    </tr>
				    
				    ";
				}
				echo 
					"
					</table>
					";
					echo "<a class='btn btn-success' href='reports-day?export_data=true&fecha=".$fecha."&caja=".$_POST['caja']."&empresa=".$_POST['empresa']."'>Exportar</a>";
					echo "<a class='btn btn-warning' href='report-imp-day?export_data=true&fecha=".$fecha."&caja=".$_POST['caja']."&empresa=".$_POST['empresa']."' target='_blank'>imprimir</a>";
			break;

			
		
	}

?>

