<?php 
require_once ("../bd/conexion.php");
require_once '../funciones/usuario.php';

if (empty($_POST['curso'])) {
    echo "Campo curso está vacio";
}elseif (!empty($_POST['curso'])) {
    $curso= strtoupper($_POST['curso']);
    $fecha_inicio= $_POST['fecha_inicio'];
    $fecha_fin= $_POST['fecha_fin'];
    $total_horas =  $_POST['total_horas'];
    $docente= $_POST['docente'];

    $cursoExist = "SELECT * FROM curso WHERE nombre_curso = ?";
    $query = $db->prepare($cursoExist);
    $query->execute([$curso]);
    $row = $query->rowCount();

    if ($row > 0) {
        echo "Este curso ya ha sido Asignado";

        exit();
    }

    $query_agregar = "INSERT INTO curso (nombre_curso, fecha_inicio, fecha_fin, total_horas, docente_id) VALUES (?,?,?,?,?)";

    $insertar=$db->prepare($query_agregar);
    $insertar->execute([$curso, $fecha_inicio, $fecha_fin, $total_horas, $docente]);

    if ($insertar) {
        echo "Se guardó los datos correctamente";
    }else{
        echo "Tuvimos un problema en el proceso, intente de nuevo";
    }
}


 ?>