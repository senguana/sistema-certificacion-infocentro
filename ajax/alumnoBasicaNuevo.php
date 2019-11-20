<?php 
require_once ("../bd/conexion.php");
require_once './../funciones/alumno_basica.php';

if (empty($_POST['dni'])) {
    echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Complete el campo dni
                </div>";

}elseif (strlen($_POST['dni']) < 10 || strlen($_POST['dni']) > 10) {
     echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>El campo dni debe tener 10 numeros 
                </div>";
}
elseif (empty($_POST['nombres'])) {
    echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Complete el campo nombres
                </div>";
}elseif (is_numeric($_POST['nombres'])) {
     echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Campo nombre no debe contener numeros y caracteres especiales
                </div>";
}

elseif (empty($_POST['apellidos'])) {
    echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Complete el campo apellidos
                </div>";
}elseif (empty($_POST['genero'])) {
   echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Debes agregar el campo genero
                </div>";
}elseif (empty($_POST['fech_nac'])) {
    echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Complete el campo fecha de nacimiento
                </div>";
}elseif (empty($_POST['institucion'])) {
    echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Complete el campo instituciòn
                </div>";
}elseif (empty($_POST['grado'])) {
   echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Elije el grado a la que pertenece el alumno
                </div>";
}elseif (!empty($_POST['dni'])) {

    $dni        = $_POST['dni'];
    $nombres    = $_POST['nombres'];
    $apellidos  = $_POST['apellidos'];
    $genero     = $_POST['genero'];
    $fech_nac   = $_POST['fech_nac'];
    $institucion= $_POST['institucion'];
    $grado      = $_POST['grado'];
    // $estado     = $_POST['estado'];

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
         echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'> 
                Este $dni ya ha sido asignado</div>";

         die();
     }else {

    $query_agregar = "INSERT INTO alumno_basica(dni_alum_s, nombres_alum_s, apellidos_alumn_s, genero, fech_nac, institucion_id, estado, grado_id) VALUES  (:dni, :nom, :apell, :gen, :fech_nac, :inst, :grado)";

    $insertar=$db->prepare($query_agregar);
    $insertar->bindParam(':dni', $dni);
    $insertar->bindParam(':nom', $nombres);
    $insertar->bindParam(':apell', $apellidos);
    $insertar->bindParam(':gen', $genero);
    $insertar->bindParam(':fech_nac', $fech_nac);
    $insertar->bindParam(':inst', $institucion);
    $insertar->bindParam(':grado', $ciudad);
    $insertar->execute();

    if ($insertar) {
        echo "<div  class='btn-success' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Se guardó los datos correctamente
                </div>";
    }else{
        echo "<div  class='btn-danger' style=' height: 30px; padding: 5px; text-align: center; border-radius: 2px;'>Tuvimos un problema en el proceso, intente de nuevo</div>";
    }
}
}



 ?>