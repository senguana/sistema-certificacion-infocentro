<?php 

session_start();

require_once './../bd/conexion.php';

// echo $_SESSION['userId'];

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
 ?>
 