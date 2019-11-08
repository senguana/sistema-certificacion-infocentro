<?php 
require_once ("../bd/conexion.php");
require_once './../funciones/alumno_basica.php';

if (empty($_POST['dni'])) {
    echo "Campo dni está vacio";
}elseif (!empty($_POST['dni'])) {

    $dni        = $_POST['dni'];
    $nombres    = $_POST['nombres'];
    $apellidos  = $_POST['apellidos'];
    $genero     = $_POST['genero'];
    $fech_nac   = $_POST['fech_nac'];
    $institucion= $_POST['institucion'];
    $grado      = $_POST['grado'];
    $estado     = $_POST['estado'];

     // $fech_nac = strtotime($fech_nac);
     //     $edad = date('Y', $fech_nac);
     //      if (($mes = (date('m') - date('m', $fech_nac))) < 0) {
     //       $edad++;
     //      } elseif ($mes == 0 && date('d') - date('d', $fech_nac) < 0) {
     //       $edad++;
     //      }

     // $anno = date('Y') - $edad;


    $AlumnoExist = "SELECT * FROM alumno_basica WHERE dni_alum_s = ?";
     $query = $db->prepare($AlumnoExist);
    $query->execute([$dni]);
    $row = $query->rowCount();
     if ($row > 0) {
         echo "Este $dni ya ha sido Asignado";

         die();
     }


    $query_agregar = "INSERT INTO alumno_basica(dni_alum_s, nombres_alum_s, apellidos_alumn_s, genero, fech_nac, institucion_id, estado, grado_id) VALUES  (?,?,?,?,?,?,?,?)";

    $insertar=$db->prepare($query_agregar);
    $insertar->execute([$dni, $nombres, $apellidos, $genero, $fech_nac, $institucion, $estado, $grado]);

    if ($insertar) {
        echo "Se guardó los datos correctamente";
    }else{
        echo "Tuvimos un problema en el proceso, intente de nuevo";
    }
}


 ?>