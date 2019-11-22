<?php 
require_once ("../bd/conexion.php");
// require_once '../funciones/representante.php';

if (empty($_POST['id_alumno'])) {
    echo "El id esta vacio  vacio";
}elseif (empty( $_POST['nombres'])) {
    echo "<p class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Debes ingresar los nombres de los estudiantes</p>";
}
elseif (!empty($_POST['id_alumno']) && !empty($_POST['dni']) && !empty($_POST['nombres']) &&!empty($_POST['apellidos']) && !empty($_POST['genero']) && !empty($_POST['fech_nac'])&& !empty($_POST['institucion']) && !empty($_POST['grado']) ) {

    $dni= $_POST['dni'];
    $nombre= $_POST['nombres'];
    $apellido= $_POST['apellidos'];
    $genero=$_POST['genero'];
    $nacimiento= $_POST['fech_nac'];
    $institucion = $_POST['institucion'];
    $grado= strval($_POST['grado']);
    
    $id_alumn= intval($_POST['id_alumno']);

    $sql = "UPDATE alumno_basica SET dni_alum_s=?, nombres_alum_s=?, apellidos_alumn_s=?, genero=?, fech_nac=?, institucion_id=?,grado_id=?  WHERE id_alumno_s=?";

    $result = $db->prepare($sql);

    $result->execute([$dni,$nombre,$apellido,$genero,$nacimiento,$institucion,$grado,$id_alumn]);

    // $insertar = actualizarRepre($dni, $nombre, $apellido, $telefono, $genero, $profesion, $id_repre);

    if ($result==true) {
        echo "<p class='btn-success' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Se actualizò los datos correctamente</p>";
    }else{
        echo "Tuvimos un problema en el proceso, intente de nuevo";
    }
}


 ?>