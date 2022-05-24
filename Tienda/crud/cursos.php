<?php

// incluye la clase Db
if(basename($_SERVER['PHP_SELF']) == "index22.php"){
	include_once('class/conextion.php');
}else{
	include_once('../class/conextion.php');
}

 
	class CrudCursos{
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo curso
		public function insertar($curso){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO cursos values(default,:nombre,:descripcion,:tama,:precio,:id_prof)');
            $insert->bindValue(':nombre',$curso->getNombre());
			$insert->bindValue(':descripcion',$curso->getDescripcion());
			$insert->bindValue(':tama',$curso->getTamañoC(),PDO::PARAM_INT);
			$insert->bindValue(':precio',$curso->getPrecio(),PDO::PARAM_INT);
            $insert->bindValue(':id_prof',$curso->getId_prof());
			
			if($insert->execute()){
				return True;
			}else{
				return False;
			}
 
		}
 
		// método para mostrar todos los cursos
		public function mostrar(){
			$db=Db::conectar();
			$listaCursos=[];
			$select=$db->query('SELECT * FROM cursos');
 
			foreach($select->fetchAll() as $curso){
				$myCurso= new Curso();
				$myCurso->setIdCurso($curso['idCurso']);
				$myCurso->setNombre($curso['nombre']);
				$myCurso->setDescripcion($curso['descripcion']);
				$myCurso->setTamañoC($curso['tamañoC']);
				$myCurso->setPrecio($curso['precio']);
                $myCurso->setId_prof($curso['id_prof']);

				$listaCursos[]=$myCurso;
			}
			return $listaCursos;
		}
 
		// método para eliminar un curso, recibe como parámetro el id del curso
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM cursos WHERE idCurso=:id');
			$eliminar->bindValue(':id',$id);
			if($eliminar->execute()){
				return True;
			}else{
				return False;
			}
 
		}
 
		// método para buscar un curso, recibe como parámetro el id del curso
		public function obtenerCurso($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM cursos WHERE idCurso=:id');
			$select->bindValue(':id',$id);
			$select->execute();
			$curso=$select->fetch();
			$myCurso= new Curso();
			$myCurso->setIdCurso($curso['idCurso']);
            $myCurso->setNombre($curso['nombre']);
            $myCurso->setDescripcion($curso['descripcion']);
            $myCurso->setPrecio($curso['precio']);
			$myCurso->setTamañoC($curso['tamañoC']);
            $myCurso->setId_prof($curso['id_prof']);

			return $myCurso;
		}
 
		// método para actualizar un curso, recibe como parámetro el curso
		public function actualizar($curso){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE cursos SET nombre=:nombre, descripcion=:descripcion, tamañoC=:tamano,precio=:precio, id_prof=:id_prof WHERE idCurso=:id');
            $actualizar->bindValue(':id',$curso->getIdCurso());
            $actualizar->bindValue(':nombre',$curso->getNombre());
			$actualizar->bindValue(':descripcion',$curso->getDescripcion());
			$actualizar->bindValue(':tamano',$curso->getTamañoC());
			$actualizar->bindValue(':precio',$curso->getPrecio());
            $actualizar->bindValue(':id_prof',$curso->getId_prof());
			if($actualizar->execute()){
				return True;
			}else{
				return False;
			}
		}

		public function mostrarP($a){
			$db=Db::conectar();
			$listaCursos=[];
			$select=$db->query('SELECT * FROM cursos WHERE id_prof='.$a.'');
 
			foreach($select->fetchAll() as $curso){
				$myCurso= new Curso();
				$myCurso->setIdCurso($curso['idCurso']);
				$myCurso->setNombre($curso['nombre']);
				$myCurso->setDescripcion($curso['descripcion']);
				$myCurso->setTamañoC($curso['tamañoC']);
				$myCurso->setPrecio($curso['precio']);
                $myCurso->setId_prof($curso['id_prof']);

				$listaCursos[]=$myCurso;
			}
			return $listaCursos;
		}
	}
?>