<?php
	include_once('./../bd/conexion.php');

	$errors  = array();
	$messages    = array();
	$success = "";
		if(empty($_POST['username']))
		{
			$errors[] = "Usuario requerido";	
		}
	
		if(empty($_POST['password']))
		{
			$error[] = "Password requerido";	
		}

		if(count($errors)>0)
		{
			$messages['msg']    = $errors;
			$messages['status'] = false;	
			echo json_encode($messages);
			exit;
		}
	    $statement = $db_con->prepare("select * from usuario where username_usua = :email AND password_usua = :password" );
        $statement->execute(array(':email' => $_POST['username'],'password'=> md5($_POST['password'])));
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);
		if(count($row)>0)
		{
		  session_start();
		  $_SESSION['user_id'] = $row[0]['user_id'];
		  $messages['redirect']    = "home.php";
		  $messages['status']      = true;	
		  echo json_encode($messages);
		  exit;	
		}
		else
		{
		   $errors[] = "Email and password does not match";
		  $messages['msg']    = $errors;
		  $messages['status']      = false;	
		  echo json_encode($messages);
		  exit;	
		} 
?>