<?php 	

require_once '../bd/conexion.php';

$consulta = "SELECT *  FROM usuario u INNER JOIN profesion p ON u.profesion = p.id_profesion WHERE estado = 1 ORDER BY id_usua ASC";

$query_listar = $db->prepare($consulta);
$query_listar->execute();

$row = $query_listar->fetchAll();

$result=$query_listar->rowCount();

$output = array('data' => array());

if($result > 0) { 
	foreach ($row as $dato) {
		$id = $dato['id_usua']; 
		$dni = $dato['dni_usua']; 
		$nombre = $dato['nombre_usua']; 
		$apellido = $dato['apellido_usua']; 
		$correo = $dato['correo_usua'];
		$genero = $dato['genero_usua']; 
		$user = $dato['username_usua'];
		$profesion = $dato['nombre_profesion'];
	
	
 	

 	$button = '<div class="form-button-action">
	<button type="button"  data-toggle="modal" data-target="#EditUsuario" title="Editar" onclick="EditarUsuario('.$id.')" class="btn btn-link btn-primary" id="Edit">
		<i class="fa fa-edit"></i>
	</button>
	<button type="button" data-toggle="modal" data-target="#deleteUsuarioModal" title="" class="btn btn-link btn-danger"data-original-title="Remove" onclick="EliminarUsuario('.$id.')">
								<i class="fa fa-times"></i>
							</button></div>';

 	$output['data'][] = array( 		
 		$dni,
		$nombre,
		$apellido,
		$correo,
		$genero, 
		$user,
		$profesion,
 		$button
 		); 	
 }  

} 


echo json_encode($output);