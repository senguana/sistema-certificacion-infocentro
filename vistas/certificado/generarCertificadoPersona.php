<?php

	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;
	session_start();
	if(empty($_SESSION['user_login_status']))
	{
		header('location: ../');
	}

	include "../../bd/conexion.php";
	require_once '../../FPDF/vendor/autoload.php';
	use Dompdf\Dompdf;

	if(empty($_REQUEST['dni']) || empty($_REQUEST['curso']))
	{
		echo "No es posible generar la factura.";
	}else{
		$dni = $_REQUEST['dni'];
		$curso = $_REQUEST['curso'];
		$anulada = '';

		

		$query1 = "SELECT * FROM representante r INNER JOIN profesion p ON r.cod_profesion = p.id_profesion WHERE id_repre = 129";
		$consulta1=$db->prepare($query1);
		$consulta1->execute();
		$representante = $consulta1->fetch(PDO::FETCH_ASSOC);

		$query2 = "SELECT * FROM representante r INNER JOIN profesion p ON r.cod_profesion = p.id_profesion WHERE id_repre = 130";
		$consulta2=$db->prepare($query2);
		$consulta2->execute();
		$representante1 = $consulta2->fetch(PDO::FETCH_ASSOC);

		
		$query = $db->prepare("SELECT p.id_per, p.dni, p.nombres_per, p.apellidos_per, p.genero_per, fecha_inicio, fecha_fin, c.nombre_curso, c.total_horas, curso_id FROM add_curso_estudiante ad INNER JOIN personas p ON ad.persona_id = p.id_per INNER JOIN curso c ON ad.curso_id = c.id_curso WHERE p.dni = $dni AND c.id_curso = $curso");
		$query->execute();

		$result = $query->rowCount();
		if($result > 0){

			$persona = $query->fetch(PDO::FETCH_ASSOC);
			setlocale(LC_TIME, "spanish");

			$fecha_inicio = $persona['fecha_inicio'];
		
			$fecha_inicio = str_replace("/", "-", $fecha_inicio);			
			$newDate = date("d-m-Y", strtotime($fecha_inicio));				
			$mesDesc = strftime(" %d de %B de %Y", strtotime($newDate));

			$fecha_fin = $persona['fecha_fin'];
		
			$fecha_fin = str_replace("/", "-", $fecha_fin);			
			$newDate1 = date("d-m-Y", strtotime($fecha_fin));				
			$mesDesc1 = strftime(" %d de %B de %Y", strtotime($newDate1));

			// $no_factura = $factura['nofactura'];

			// if($factura['estatus'] == 2){
			// 	$anulada = '<img class="anulada" src="img/anulado.png" alt="Anulada">';
			// }

			// $query_productos = mysqli_query($conection,"SELECT p.descripcion,dt.cantidad,dt.precio_venta,(dt.cantidad * dt.precio_venta) as precio_total
			// 											FROM factura f
			// 											INNER JOIN detallefactura dt
			// 											ON f.nofactura = dt.nofactura
			// 											INNER JOIN producto p
			// 											ON dt.codproducto = p.codproducto
			// 											WHERE f.nofactura = $no_factura ");
			// $result_detalle = mysqli_num_rows($query_productos);

			ob_start();
		    include(dirname('__FILE__').'/certificado_persona.php');
		     $html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf('hola');

			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'landscape');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			$dompdf->stream('certificado_'.$persona['nombres_per'].$persona['nombre_curso'].'.pdf',array('Attachment'=>0));
			exit;
		}
	}

?>