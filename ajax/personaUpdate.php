<?php 

require '../bd/conexion.php';
if (empty($_POST['dni'])) {
	echo "<p class='btn btn-danger'>Campo dni vacio</p>";
}
elseif (empty($_POST['nombres'])) {
	echo "<p class='btn btn-danger'>Campo nombre vacio</p>";

}elseif (empty($_POST['apellidos'])) {
	echo "<p class='btn btn-danger'>Campo apellidos vacio</p>";

}elseif (empty($_POST['genero'])) {
	echo "<p class='btn btn-danger'>Campo genero vacío</p>";

}elseif (empty($_POST['comuna'])) {
	echo "<p class='btn btn-danger'>Campo comuna vacío</p>";

}elseif (!empty($_POST['nombres'])&&!empty($_POST['apellidos'])&&!empty($_POST['genero'])&&!empty($_POST['comuna'])) {
	$dni = $_POST['dni'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$genero = $_POST['genero'];
	$comuna = $_POST['comuna'];
	$id_update = $_POST['id_persona'];

	$insertar=$db->prepare("UPDATE personas SET dni =:dni, nombres_per =:nombres, apellidos_per =:apellidos, genero_per=:genero, comuna=:comuna WHERE id_per=:id");
	$insertar->execute(array(
		":dni"       =>$dni,
		":nombres"   =>$nombres,
		":apellidos" =>$apellidos,
		":genero"       =>$genero,
		":comuna"    =>$comuna,
		":id"        =>$id_update
	));

	if ($insertar ==true) {
		echo "<p class='btn btn-success'>Se actualizó correctamente</p>";
	}else {
		echo "<p class='btn btn-danger'>No se pudo actualizar los datos</p>";
	}

	

}

 ?>