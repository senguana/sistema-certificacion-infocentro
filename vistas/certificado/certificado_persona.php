<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Certificado</title>
    <!-- <link rel="stylesheet" href="estilos.css">  -->
     <link rel="stylesheet" type="text/css" href="style.css">  
</head>
<body>
	<div class="container">
		<img class="imagen" src="../../assets/img/infocentro/certificado/fondo-certificado.jpg" alt="">
		<h1 class="titulo">GOBIERNO AUTÓNOMO DESCENTRALIZADO PARROQUIAL RURAL LUZ DE AMÉRICA</h1>
		
		<div class="otorga">otorga el presente</div>

		<div class="certificado">CERTIFICADO</div>

		<div class="asistencia">- DE ASISTENCIA A -</div>

		<div class="persona"><?php echo strtoupper($persona['nombres_per'] ." " . $persona['apellidos_per']); ?>
			<hr>
		</div>

		<!-- <hr> -->
		<div class="cedula">C.I: <?php echo $persona['dni']; ?></div>

		<div class="aprobado">Por haber aprobado el curso:</div>

		<div class="curso"><?php echo $persona['nombre_curso']; ?></div>

		<div class="informacion">Dictado en el Proyecto Infocentro Luz de América, desde el <?php echo $mesDesc; ?> hasta el <?php echo $mesDesc1; ?> con una duración de <b> <?php echo $persona['total_horas']; ?> </b> horas.</div>

		<div class="fecha">"Certificado generado el <?php echo strftime("%A, %d de %B de %Y"); ?>"</div>

		<div class="repre1">
			<hr>
			<p><b>MSc. </b><?php echo $representante['nombres_repre'] . " ". $representante['apellidos_repre']; ?></p>
			<p class ="prof1">Presidenta del GADPR <br>
			Luz de América</p>
		</div>
		<div class="repre2">
			<hr>
			<p><b>Sr. </b><?php echo $representante1['nombres_repre'] . " ". $representante1['apellidos_repre']; ?></p>
			<p class ="prof2">Facilitador del Infocentro <br>Luz de América</p>
		</div>
		<div class="logo1">
			<img src="../../assets/img/infocentro/logo/logo1.jpg" alt="" width="130" height="100">
		</div>
		<div class="logo2">
			<img src="../../assets/img/infocentro/logo/logo2.jpg" alt="" width="130" height="100">
			
		</div>
		<!-- <div class="logo3">
			<img src="../../assets/img/infocentro/logo/logo3.jpg" alt="" width="80" height="70">
			
		</div> -->
	</div>
	  	 			
</body>
</html>