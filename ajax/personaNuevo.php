<?php 
require_once ("../bd/conexion.php");
if (empty($_POST['dni'])) {
    echo "Campo dni es obligatorio";
}
elseif (empty($_POST['nombres']) && empty($_POST['apellidos']) && empty($_POST['genero']) && empty($_POST['comuna'])) {
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
    $dni = $_POST['dni'];
    $nombres= strtoupper($_POST['nombres']);
    $apellidos= $_POST['apellidos'];
    $genero= $_POST['genero'];
    $comuna =  $_POST['comuna'];

    $query = $db->prepare("SELECT dni FROM personas WHERE dni =:dni");
    $query->execute(array(':dni' =>$dni));
    $row = $query->rowCount();

    if ($row > 0) {
        echo "Este $dni ya existe";
    }else{
        $query_agregar = "INSERT INTO `personas`( dni, `nombres_per`, `apellidos_per`, `genero_per`, `comuna`) VALUES (?,?,?,?,?)";

        $insertar=$db->prepare($query_agregar);
        $insertar->bindParam(1,$dni);
        $insertar->bindParam(2, $nombres);
        $insertar->bindParam(3, $apellidos);
        $insertar->bindParam(4, $genero);
        $insertar->bindParam(5, $comuna);
        $insertar->execute();

        if ($insertar) {
            echo "Se guardó los datos correctamente";
        }else{
            echo "Tuvimos un problema en el proceso, intente de nuevo";
        }
    }
}


 ?>