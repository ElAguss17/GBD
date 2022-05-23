<?php

//incluye la clase curso y Crudcurso
include_once("../class/cursos.php");
include_once("../crud/cursos.php");
if (session_status() !== 2) {
	session_start();
}
$crud= new CrudCursos();
$curso= new Curso();
 
	// si el elemento insertar no viene nulo llama al crud e inserta un curso
	if (isset($_POST['insertar'])) {
		$curso->setNombre($_POST['nombre']);
		$curso->setDescripcion($_POST['descripcion']);
		$curso->setTamañoC($_POST['tamaño']);
		$curso->setPrecio($_POST['precio']);
        $curso->setId_prof($_POST['profesor']);
		//llama a la función insertar definida en el crud
		$crud->insertar($curso);
		if($_SESSION["Rool"]=='administrador'){
			header('Location: ../archives/add_clase.php');
		}elseif($_SESSION["Rool"]=='profesor'){
			header('Location: ../archives/profe_add_clase.php');
		}
		
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el curso
	}elseif(isset($_POST['actualizar'])){
		$curso->setIdCurso($_POST['id']);
		$curso->setNombre($_POST['nombre']);
		$curso->setDescripcion($_POST['descripcion']);
		$curso->setTamañoC($_POST['tamaño']);
		$curso->setPrecio($_POST['precio']);
        $curso->setId_prof($_POST['profesor']);
		$crud->actualizar($curso);
		header('Location: ../archives/modi_clase.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un curso
	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id']);
		if($_SESSION["Rool"]=='administrador'){
			header('Location: ../archives/modi_clase.php');
		}elseif($_SESSION["Rool"]=='profesor'){
			header('Location: ../archives/profe_modi_clase.php');
		}
	}	
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	elseif($_GET['accion']=='a'){
		if($_SESSION["Rool"]=='administrador'){
			header('Location: ../archives/update_clase.php');
		}elseif($_SESSION["Rool"]=='profesor'){
			header('Location: ../archives/profe_updare_clase.php');
		}
	}
?>