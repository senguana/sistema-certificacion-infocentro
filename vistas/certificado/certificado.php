<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Certificado</title>
    <!-- <link rel="stylesheet" href="estilos.css">  -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="page_pdf">
	<table id="head">
		<tr>
			
			<td class="info_empresa">
				<hr>
				<span>MINISTERIO <b>DE TELECOMUNICACIONES Y DE LA SOCIEDAD DE LA INFORMACIÓN</b></span>
				<hr>
				<p>OTORGA EL PRESENTE CERTIFICADO A:</p>
				<span class="alumno"><?php echo strtoupper($factura['nombres_alum_s'] ." " . $factura['apellidos_alumn_s']); ?></span>
				<span class="dni">C.I.<?php echo $factura['dni_alum_s']; ?></span>
			</td>
			
		</tr>
	</table>

	<table id="head">
		<tr>
			<td class="detalle">
				<span>Por haber aprobado el curso:</span>
				<p class="curso"><?php echo $factura['nombre_curso']; ?></p>
				<p class="informacion">Que forma parte del "Plan Nacional de Alistamiento Digital - PLANADI", y fue dictado desde el <?php echo $factura['fecha_inicio']; ?> hasta el <?php echo $factura['fecha_fin']; ?> con una duración de <?php echo $factura['total_horas']; ?> horas.</p>
				<p>
				<span class="fecha">"Certificado generado el <?php echo date("d") . " del " . date("m") . " de " . date("Y"); ?></span>
			</td>
		</tr>
	</table>
	<table id="head">
		<td class="representante1">
			<p class="repre1"><?php echo $representante['nombre_profesion'] . " ". $representante['nombres_repre'] . " ". $representante['apellidos_repre']; ?></p>
			<p>Luz de Amèrica</p>

		</td>
		<td class="representante2">
			<p class="repre2"><?php echo $representante['nombre_profesion'] ." " . $representante['nombres_repre'] . " ". $representante['apellidos_repre']; ?></p>
			<p>Viceministro de Tecnologìas <br> de Informaciòn y Comunicaciòn</p>
		</td>
		<!-- <td class="logo">
			<div>
				<img src=""  width="100" height="100">
			</div>
		</td> -->
		<td class="logo1">
		<img src="<?php echo $foto2;?>"  width="100" height="100">
		</td>
		<td class="logo2">
		<img src="<?php echo $foto3;?>"  width="100" height="100">
				
		</td>
	</table>
</div>
</body>
</html>