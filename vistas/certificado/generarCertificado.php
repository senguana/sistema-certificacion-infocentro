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

		

		$query1 = "SELECT * FROM representante r INNER JOIN profesion p ON r.cod_profesion = p.id_profesion";
		$consulta1=$db->prepare($query1);
		$consulta1->execute();
		$representante = $consulta1->fetch(PDO::FETCH_ASSOC);

		$query = "SELECT * FROM configuracion";
		$consulta = $db->prepare($query);
		$consulta->execute();
		if($consulta->rowCount() > 0){
			$row= $consulta->fetch(PDO::FETCH_ASSOC);
			$foto1 = "../../upload/".$row['imagen1'];
			$foto2 = "../../upload/".$row['imagen2'];
			$foto3 = "../../upload/".$row['imagen3'];
			$foto4 = "../../upload/".$row['imagen4'];
		}

		$query = $db->prepare("SELECT a.dni_alum_s, a.nombres_alum_s, a.apellidos_alumn_s, c.nombre_curso, c.fecha_inicio, c.fecha_fin, c.total_horas FROM add_curso_estudiante ad INNER JOIN alumno_basica a ON ad.alumno_basica_id = a.id_alumno_s INNER JOIN curso c ON c.id_curso = ad.curso_id WHERE a.dni_alum_s = $dni AND c.id_curso = $curso");
		$query->execute();

		$result = $query->rowCount();
		if($result > 0){

			$factura = $query->fetch(PDO::FETCH_ASSOC);
			

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
		    include(dirname('__FILE__').'/certificado.php');
		     $html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf('hola');

			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('letter', 'landscape');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			$dompdf->stream('certificado_'.$factura['nombres_alum_s'].$factura['nombre_curso'].'.pdf',array('Attachment'=>0));
			exit;
		}
	}

?>