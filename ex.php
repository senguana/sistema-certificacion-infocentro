<div id="page_pdf">
	
	<table class="head">
		
		
		<td class="logo1">
		<img src=""  width="100" height="100">
		</td>
		<td class="logo2">
		<img src=""  width="100" height="100">
				
		</td>
	</table>
</div>
<table class ="head">
		<tr>
			<td class="info_empresa">
				<span>GOBIERNO AUTONOMO DESCENTRALIZADO PARROQUIAL RURAL LUZ DE AMÉRICA</span>
				<p>otorga el presente</p>
				<p id="certificado">CERTIFICADO</p>
				<p id="asistencia">- DE ASISTENCIA A -</p>
				<span class="alumno"><?php echo strtoupper($persona['nombres_per'] ." " . $persona['apellidos_per']); ?></span>
				<hr>
				<span class="dni">C.I.<?php echo $persona['dni']; ?></span>
			</td>
			
		</tr>
	</table>

	<table class="head">
		<tr>
			<td class="detalle">
				<span>Por haber aprobado el curso:</span>
				<p class="curso"><?php echo $persona['nombre_curso']; ?></p>
				<p class="informacion">Que forma parte del "Plan Nacional de Alistamiento Digital - PLANADI", y fue dictado desde el <?php echo $persona['fecha_inicio']; ?> hasta el <?php echo $persona['fecha_fin']; ?> con una duración de <?php echo $persona['total_horas']; ?> horas.</p>
				<p>
				<span class="fecha">"Certificado generado el <?php echo date("d") . " del " . date("m") . " de " . date("Y"); ?></span>
			</td>
		</tr>
	</table>
<td class="representante1">
			<p class="repre1"><?php echo $representante['nombre_profesion'] . " ". $representante['nombres_repre'] . " ". $representante['apellidos_repre']; ?></p>
			<p>Luz de Amèrica</p>

		</td>
		<td class="representante2">
			<p class="repre2"><?php echo $representante['nombre_profesion'] ." " . $representante['nombres_repre'] . " ". $representante['apellidos_repre']; ?></p>
			<p>Viceministro de Tecnologìas <br> de Informaciòn y Comunicaciòn</p>
		</td>