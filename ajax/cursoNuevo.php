<?php 
 require_once ("../bd/conexion.php");
 require_once '../funciones/usuario.php';
 $valid['success'] = array('success' => false, 'messages' => array());

 if (!empty($_POST['nameCurso']) && !empty($_POST['fechaInicio']) && !empty($_POST['fechaFin']) && !empty($_POST['totalHoras']) && !empty($_POST['nameTeacher'])) {

     $curso= strtoupper($_POST['nameCurso']);
     $fecha_inicio= $_POST['fechaInicio'];
     $fecha_fin= $_POST['fechaFin'];
     $total_horas =  $_POST['totalHoras'];
     $docente= $_POST['nameTeacher'];

     $cursoExist = "SELECT * FROM curso WHERE nombre_curso = ?";
     $query = $db->prepare($cursoExist);
     $query->execute([$curso]);
     $row = $query->rowCount();

     if ($row > 0) {
         echo "Este curso ya ha sido Asignado";

         exit();
     }else {
     $query_agregar = "INSERT INTO curso (nombre_curso, fecha_inicio, fecha_fin, total_horas, docente_id) VALUES (?,?,?,?,?)";

     $insertar=$db->prepare($query_agregar);
     $insertar->bindParam(1, $curso);
     $insertar->bindParam(2, $fecha_inicio);
     $insertar->bindParam(3, $fecha_fin);
     $insertar->bindParam(4, $total_horas);
     $insertar->bindParam(5, $docente);
     $insertar->execute();

     if ($insertar) {
        $valid['success'] = true;
         $valid['messages'] = "Creado exitosamente"; 
     }else{
         $valid['success'] = false;
         $valid['messages'] = "Error no se ha podido guardar";
     }
 }
 echo json_encode($valid);

 }

 ?>