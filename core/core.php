<?php 

session_start();

require_once './../../bd/conexion.php';

// echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location: ./login.php');	
}
 ?>