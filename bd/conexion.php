<?php

// include_once 'configuracion.php';

 $link = 'mysql:host=localhost;dbname=sistema-infocentro';
 $usuario  = 'root';
 $password = '@ignacio1998';

  try {

    $db= new PDO($link, $usuario, $password);
    // echo "Conectado";

    // foreach($pdo->query('SELECT * from colores') as $fila) {
   //      print_r($fila);
   //  }

  } catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>