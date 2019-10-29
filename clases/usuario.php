<?php 
	/*
	*
	*
	*/
	class Usuario{
		private $id;
		private $dni;
		private $nombre;
		private $apellido;
		private $correo;
		private $genero;
		private $password;
		private $idProfesion;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getDni(){
			return $this->dni;
		}

		public function setDni($dni){
			$this->dni = $dni;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getApellido(){
			return $this->apellido;
		}

		public function setApellido($apellido){
			$this->apellido = $apellido;
		}

		public function getCorreo(){
			return $this->correo;
		}

		public function setCorreo($correo){
			$this->correo = $correo;
		}

		public function getGenero(){
			return $this->genero;
		}

		public function setGenero($genero){
			$this->genero = $genero;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function getIdProfesion(){
			return $this->idProfesion;
		}

		public function setIdProfesion($idProfesion){
			$this->idProfesion = $idProfesion;
		}
	}
?>