<?php
//incluye la clase curso y Crudcurso
include_once("../class/usuarios.php");
include_once("../crud/usuarios.php");
 
$crud= new CrudUsuarios();
$curso= new Usuarios();
 
	// si el elemento insertar no viene nulo llama al crud e inserta un curso
	if (isset($_POST['insertar'])) {
		print("uno");
		$curso->setNombre($_POST['nombre']);
		$curso->setApellido($_POST['apellido']);
		$curso->setEmail($_POST['email']);
		$curso->setPassword($_POST['passw']);
		//llama a la función insertar definida en el crud
		if($crud->correo($curso->getEmail())){
			print("El Email ya esta registrado ");
        	print("<a href=\"https://agustinjaimez.informaticailiberis.com/Tienda/index2.php\">Volver</a>");
		}else{
			if(!$crud->insertar($curso)){
				print("NO se ha podido insertar");
			}else{
				print("bien");
			}
			header('Location: https://agustinjaimez.informaticailiberis.com/Tienda/index2.php');
		}
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el curso
	}elseif (isset($_POST['insertar2'])) {
		print("3");
		$curso->setNombre($_POST['nombre']);
		$curso->setApellido($_POST['apellido']);
		$curso->setEmail($_POST['email']);
		$curso->setPassword($_POST['password']);
		$curso->setRool($_POST['rool']);
		//llama a la función insertar definida en el crud
		if(!$crud->insertar2($curso)){
			print("NO se ha podido insertar");
		};
		header('Location: https://agustinjaimez.informaticailiberis.com/Tienda/archives/add_usu.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el curso
	}elseif(isset($_POST['actualizar'])){
		print("4");
		$curso->setIdUsuario(($_POST['idU']));
		$curso->setNombre($_POST['nombre']);
		$curso->setApellido($_POST['apellido']);
		$curso->setEmail($_POST['email']);
		$curso->setPassword($_POST['password']);
        $curso->setRool($_POST['rool']);
		if($crud->actualizar($curso)){
					header('https://agustinjaimez.informaticailiberis.com/Tienda/archives/modi_usu.php');
		}else{
			print("No se ha actualizado");
		}
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un curso
	}elseif ($_GET['accion']=='e') {
		print($_GET['idU']);
		$crud->eliminar($_GET['idU']);
		header('Location: https://agustinjaimez.informaticailiberis.com/Tienda/archives/modi_usu.php');	
	}	
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	elseif($_GET['accion']=='a'){
		header('Location: ../archives/update_usu.php');
	}
?>