<?php 
require_once ("../bd/conexion.php");

if (empty($_POST['comuna'])) {
    echo "Campo comuna vaciò";
}
elseif (!empty($_POST['comuna'])) {

    $comuna= strtoupper($_POST['comuna']);
    
    $consulta = "SELECT * FROM comuna WHERE descripcion = ?";
     $query = $db->prepare($consulta);
    $query->execute([$comuna]);
    $row = $query->rowCount();
     if ($row > 0) {
         echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'> 
                $comuna ya ha sido registrado</div>";
         die();
     }
     else {
        $query_agregar = "INSERT INTO `comuna`(`descripcion`) VALUES (?)";

    $insertar=$db->prepare($query_agregar);
    $insertar->bindParam(1, $comuna);
    $insertar->execute();

    if ($insertar) {
        echo "<div  class='btn-success' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Se guardó los datos correctamente</div>";
    }else{
        echo "Tuvimos un problema en el proceso, intente de nuevo";
    }
}
}


 ?>