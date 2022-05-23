<?php
	class Usuarios{
#Propiedades

		private $idUsuario;
		private $nombre;
		private $apellido;
		private $email;
        private $password;
		private $rool;
#Metodos 
		function __construct(){
        }
    #Optener
		public function getIdUsuario(){
		return $this->idUsuario;
		}

        public function getNombre(){
		return $this->nombre;
		}

        public function getApellido(){
            return $this->apellido;
            }
     
        public function getEmail(){
            return $this->email;
            }
		
		public function getPassword(){
			return $this->password;
			}
	
        public function getRool(){
            return $this->rool;
            }

    #Definir
        public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}
        public function setNombre($nombre){
			$this->nombre = $nombre;
		}
        public function setApellido($apellido){
			$this->apellido = $apellido;
		}
        public function setEmail($email){
			$this->email = $email;
		}
		public function setPassword($password){
			$this->password = $password;
		}
        public function setRool($rool){
			$this->rool = $rool;
		}
	}
?>



