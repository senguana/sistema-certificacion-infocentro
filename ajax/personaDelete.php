<?php 
require './../bd/conexion.php';

if (empty($_POST['delete_id'])) {
	echo "No se puede eliminar";

}elseif (!empty($_POST['delete_id'])) {
	$id_delete = $_POST['delete_id'];
	$elimnar = $db->prepare("DELETE FROM personas WHERE id_per =:id");
	$elimnar->execute(array(':id' =>$id_delete ));

}
 ?>