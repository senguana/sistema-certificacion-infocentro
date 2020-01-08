<?php 
  require_once '../bd/conexion.php';
  require_once '../core/core.php';

  $consulta = "SELECT *  FROM curso c INNER JOIN docente d ON c.docente_id = d.id_docente ORDER BY id_curso ASC";

  $query_listar = $db->prepare($consulta);

  $query_listar->execute();
  $json = array();
  while ($result=$query_listar->fetch(PDO::FETCH_OBJ)){
  	$json[] = array(
  		'id'=>$result->id_curso,
  		'nameCurso'=> $result->nombre_curso,
        'fechaInicio'=>$result->fecha_inicio,
        'fechaFin'=>$result->fecha_fin,
        'totalHoras'=>$result->total_horas,
        'nameTeacher'=>$result->nombre." " . $result->apellido
  	);

  }

	$jsonstring = json_encode($json);

	echo $jsonstring;	
?>								
		
