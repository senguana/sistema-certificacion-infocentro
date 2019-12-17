<?php 
require_once ("../bd/conexion.php");

if (empty($_POST['nombres']) && empty($_POST['apellidos']) && empty($_POST['genero']) && empty($_POST['comuna'])) {
    echo "Campos vacíos";

}elseif (empty($_POST['nombres'])) {
    echo "Campo nombres está vacio";

}elseif (empty($_POST['apellidos'])) {
    echo "Campo apellidos vacìo";

}elseif (empty($_POST['genero'])) {
    echo "Campo genero vaciò";

}elseif (empty($_POST['comuna'])) {
    echo "Debes agregar comuna";
}
elseif (!empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['genero']) && !empty($_POST['comuna'])) {

    $nombres= strtoupper($_POST['nombres']);
    $apellidos= $_POST['apellidos'];
    $genero= $_POST['genero'];
    $comuna =  $_POST['comuna'];

    $query_agregar = "INSERT INTO `personas`(`nombres_per`, `apellidos_per`, `genero_per`, `comuna`) VALUES (?,?,?,?)";

    $insertar=$db->prepare($query_agregar);
    $insertar->bindParam(1, $nombres);
    $insertar->bindParam(2, $apellidos);
    $insertar->bindParam(3, $genero);
    $insertar->bindParam(4, $comuna);
    $insertar->execute();

    if ($insertar) {
        echo "Se guardó los datos correctamente";
    }else{
        echo "Tuvimos un problema en el proceso, intente de nuevo";
    }
}


 ?>