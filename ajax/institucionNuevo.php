<?php 
require_once ("../bd/conexion.php");

$valid['success'] = array('success' => false, 'messages' => array());

if (!empty($_POST['institucion'])) {

    $institucion= $_POST['institucion'];
    $institucionExist = "SELECT * FROM institucion WHERE nombre_institucion = ?";
    $query = $db->prepare($institucionExist);
    $query->execute([$institucion]);
    $row = $query->rowCount();

    if ($row > 0) {
        
        $valid['messages'] = "Este institucion ya está registrado en nuestro Base de Datos";

        exit();
    }
    else {
         $query_agregar = "INSERT INTO institucion (nombre_institucion) VALUES (?)";
         $insertar=$db->prepare($query_agregar);
         $insertar->execute([$institucion]);
         if ($insertar) {
             $valid['success'] = true;
             $valid['messages'] = "Creado exitosamente"; 
         }else{
             $valid['success'] = false;
             $valid['messages'] = "Error no se ha podido guardar";
         }
     }
    

    echo json_encode($valid);

}

 ?>