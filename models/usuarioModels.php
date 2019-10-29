<?php 
	require_once('../bd/conexion.php');
	require_once './../clases/usuario.php';
	
	class UsuarioModels{
		
		public function __construct(){}

		//inserta los datos del usuario
		public function insertar($usuario){
			$db=ConectarBd::conectar();
			$insert=$db->prepare('INSERT INTO USUARIOS VALUES(NULL,:nombre, :clave)');
			$insert->bindValue('nombre',$usuario->getNombre());
			//encripta la clave
			$pass=password_hash($usuario->getClave(),PASSWORD_DEFAULT);
			$insert->bindValue('clave',$pass);
			$insert->execute();
		}

		//obtiene el usuario para el login
		public function obtenerUsuario($nombre, $clave){
			$db=ConectarBd::conectar();
			$select=$db->prepare('SELECT * FROM usuario WHERE nombre_usua=:nombre');//AND clave=:clave
			$select->bindValue('nombre',$nombre);
			$select->execute();
			$registro=$select->fetch();
			$usuario=new Usuario();
			//verifica si la clave es conrrecta
			if (password_verify($clave, $registro['clave'])) {				
				//si es correcta, asigna los valores que trae desde la base de datos
				$usuario->setId($registro['Id']);
				$usuario->setNombre($registro['nombre']);
				$usuario->setClave($registro['clave']);
			}			
			return $usuario;
		}

		//busca el nombre del usuario si existe
		public function buscarUsuario($nombre){
			$db=ConectarBd::getconection();
			$select=$db->prepare('SELECT * FROM usuario WHERE nombre_usua=:nombre');
			$select->bindValue('nombre',$nombre);
			$select->execute();
			$registro=$select->fetch();
			if($registro['Id']!=NULL){
				$usado=False;
			}else{
				$usado=True;
			}	
			return $usado;
		}

		public function getLogin()
		{
			if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
				
			}
		}
	}
?>