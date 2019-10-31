<?php
	require_once ("../bd/conexion.php");
      
        	$email= $_POST['email'];
	    $user = $_POST['user'];
	    $password_usua = $_POST['pass'];
	    $confirpass = $_POST['confirmpass'];
	   $password_usua = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$query_agregar = "INSERT INTO usuario(correo_usua, username_usua, password_usua) VALUES (:e, :u ,:p)";
		
		$nuevo_user = $db->prepare($query_agregar);
		$nuevo_user->execute(array(
			'e'=>$email, 
			'u'=>$user, 
			'p'=>$password_usua));

		if ($nuevo_user) {
			echo "se inserto";
		}else{
			echo "NO se pudo";
		}
		$nuevo_user = null;
		$db= null;
      

	
?>
	