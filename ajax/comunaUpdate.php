<?php 
require_once ("../bd/conexion.php");


if (empty($_POST['id_comuna'])) {
    echo "Campo vaciò";

}elseif (empty($_POST['comuna'])) {
    echo "Campo instituciòn vacio";

}elseif (!empty($_POST['id_comuna']) && !empty($_POST['comuna'])) {

    $comuna = $_POST['comuna'];
    $id_comuna= $_POST['id_comuna'];
 
    $sql = " UPDATE comuna SET descripcion =:a WHERE id_comuna =:id";
	$stmt2 = $db->prepare($sql);
	$stmt2->bindParam(':a', $comuna, PDO::PARAM_STR); 
	$stmt2->bindParam(':id', $id_comuna, PDO::PARAM_INT); 
	$stmt2->execute();

    if ($stmt2) {
        echo "<div  class='btn-success' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Se actualizó correctamente 
                </div>";
    }else{
        echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Tuvimos un problema en el proceso, intente de nuevo  
                </div>";
    }
}



 ?>