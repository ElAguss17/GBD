<?php
	class Curso{
#Propiedades

		private $idCurso;
		private $nombre;
		private $descripcion;
		private $tamañoC;
        private $id_prof;
		private $precio;
#Metodos 
		function __construct(){
        }
    #Optener
		public function getIdCurso(){
		return $this->idCurso;
		}

        public function getNombre(){
		return $this->nombre;
		}

        public function getDescripcion(){
            return $this->descripcion;
            }
     
        public function getTamañoC(){
            return $this->tamañoC;
            }
		
		public function getPrecio(){
			return $this->precio;
			}
	
        public function getId_prof(){
            return $this->id_prof;
            }

    #Definir
        public function setIdCurso($idCurso){
			$this->idCurso = $idCurso;
		}
        public function setNombre($nombre){
			$this->nombre = $nombre;
		}
        public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
        public function setTamañoC($tamañoC){
			$this->tamañoC = $tamañoC;
		}
		public function setPrecio($precio){
			$this->precio = $precio;
		}
        public function setId_prof($id_prof){
			$this->id_prof = $id_prof;
		}
	}
?>



