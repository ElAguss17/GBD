<?php

// incluye la clase Db
if(basename($_SERVER['PHP_SELF']) == "index22.php"){
	include_once('class/conextion.php');
}elseif(basename($_SERVER['PHP_SELF']) == "test.php"){
	include_once('class/conextion.php');
}elseif(basename($_SERVER['PHP_SELF']) == "registrarse.php"){
	include_once('class/conextion.php');
}else{
	include_once('../class/conextion.php');
}


	class CrudUsuarios{
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo curso
		public function insertar($curso){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO usuarios values(default,:nombre,:apellido,:email,:pasword,default)');
            $insert->bindValue(':nombre',$curso->getNombre());
			$insert->bindValue(':apellido',$curso->getApellido());
			$insert->bindValue(':email',$curso->getEmail());
			$insert->bindValue(':pasword',$curso->getPassword());
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
			$select=$db->query('SELECT * FROM usuarios');
 
			foreach($select->fetchAll() as $curso){
				$myCurso= new Usuarios();
				$myCurso->setIdUsuario($curso['idUsuario']);
				$myCurso->setNombre($curso['nombre']);
				$myCurso->setApellido($curso['apellido']);
				$myCurso->setEmail($curso['email']);
				$myCurso->setPassword($curso['password']);
                $myCurso->setRool($curso['rool']);

				$listaCursos[]=$myCurso;
			}
			return $listaCursos;
		}
 
		// método para eliminar un curso, recibe como parámetro el id del curso
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM usuarios WHERE idUsuario=:id');
			$eliminar->bindValue(':id',$id);
			$eliminar->execute();
		}
 
		// método para buscar un curso, recibe como parámetro el id del curso
		public function obtenerUsuario($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM usuarios WHERE idUsuario=:id');
			$select->bindValue(':id',$id);
			$select->execute();
			$curso=$select->fetch();
			$myCurso= new Usuarios();
			$myCurso->setIdUsuario($curso['idUsuario']);
            $myCurso->setNombre($curso['nombre']);
            $myCurso->setApellido($curso['apellido']);
            $myCurso->setEmail($curso['email']);
			$myCurso->setPassword($curso['password']);
            $myCurso->setRool($curso['rool']);

			return $myCurso;
		}
 
		// método para actualizar un curso, recibe como parámetro el curso
		public function actualizar($curso){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE usuarios SET nombre=:nombre, apellido=:apellido, email=:email,password=:pasword, rool=:rool WHERE idUsuario=:id');
            $actualizar->bindValue(':id',$curso->getIdUsuario());
            $actualizar->bindValue(':nombre',$curso->getNombre());
			$actualizar->bindValue(':apellido',$curso->getApellido());
			$actualizar->bindValue(':email',$curso->getEmail());
			$actualizar->bindValue(':pasword',$curso->getPassword());
            $actualizar->bindValue(':rool',$curso->getRool());
			$actualizar->execute();
		}

		public function check($usu,$passw){
			$db=Db::conectar();
			$comprobar=$db->prepare('select * from usuarios where email like :email and password like :contra');
			$comprobar->bindValue(":email",$usu,PDO::PARAM_STR);
			$comprobar->bindValue(":contra",$passw,PDO::PARAM_STR);
			$comprobar->execute();
			if($comprobar->rowCount()==1){
				return True;
			}else{
				return False;
			}
		}
	}
?>