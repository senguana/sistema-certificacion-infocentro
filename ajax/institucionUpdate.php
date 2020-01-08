<?php 
require_once ("../bd/conexion.php");
$valid['success'] = array('success' => false, 'messages' => array());
if (!empty($_POST['id_institucion']) && !empty($_POST['nombre_institucion'])) {

    $institucion = $_POST['nombre_institucion'];
    $id_institucion= $_POST['id_institucion'];
 
    $sql = " UPDATE institucion SET nombre_institucion =:a WHERE id_institucion =:id";
	$stmt2 = $db->prepare($sql);
	$stmt2->bindParam(':a', $institucion, PDO::PARAM_STR); 
	$stmt2->bindParam(':id', $id_institucion, PDO::PARAM_INT); 
	$stmt2->execute();

    if ($stmt2) {
         $valid['success'] = true;
         $valid['messages'] = "Actualizado exitosamente"; 
    }else{
        $valid['success'] = false;
        $valid['messages'] = "Error no se ha podido actualizar";
    }

    echo json_encode($valid);
}



 ?>