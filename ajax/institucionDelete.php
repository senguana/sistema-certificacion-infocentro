
<?php 
include_once '../bd/conexion.php';
$valid['success'] = array('success' => false, 'messages' => array());
if (!empty($_POST['id_delete'])){
    

    $id_institucion=intval($_POST['id_delete']);


    $sql = "DELETE FROM institucion WHERE id_institucion=:id";
    $query = $db->prepare($sql);
    $query->execute(array(":id" => $id_institucion));
   
    if ($query) {
        $valid['success'] = true;
        $valid['messages'] = "Eliminado exitosamente"; 
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error no se ha podido eliminar"; 
    }

    $db = null;
    echo json_encode($valid);
}
 ?>