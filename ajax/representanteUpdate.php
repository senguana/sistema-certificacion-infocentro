<?php 
require_once ("../bd/conexion.php");
require_once '../funciones/representante.php';

if (empty($_POST['id_repre'])) {
    echo "ID esta vacio";
}elseif (!empty($_POST['id_repre'])) {
    $dni= $_POST['dni_repre'];
    $nombre= $_POST['nombre_repre'];
    $apellido= $_POST['apell_repre'];
    $telefono= $_POST['repre_tel'];
    $genero= strval($_POST['genero_repre']);
    // $confirPass = $_POST['confirmpassword'];    
    // $date_added=date("Y-m-d H:i:s");
    $profesion = $_POST['profesion_repre'];
    $id_user= intval($_POST['id_repre']);

    $insertar = actualizarRepre($dni, $nombre, $apellido, $telefono, $genero, $profesion, $id_user);

    if ($insertar===true) {
        echo "Se actualizò los datos correctamente";
    }else{
        echo "Tuvimos un problema en el proceso, intente de nuevo";
    }
}


 ?>