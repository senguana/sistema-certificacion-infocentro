<?php 
if (empty($_POST['delete_id'])){
        echo "Id vacío.";
    } elseif (!empty($_POST['delete_id'])){
    
    include_once '../bd/conexion.php';
    

    $id_curso=intval($_POST['delete_id']);

     $sql = "UPDATE `alumno_basica` SET estado=0 WHERE id_alumno_s=:id";
    $query = $db->prepare($sql);
    $query->execute(array(":id" => $id_curso));
   
    if ($query) {
        echo "El alumno ha sido eliminado con éxito.";
    } else {
        echo "Lo sentimos, la eliminación falló. Por favor, regrese y vuelva a intentarlo.";
    }
}
 ?>