<?php 
include_once("templates/header.php");
?>
<form action='controllers/controller_cursos.php' method='post'>
	<table>
		<tr>
			<td>Nombre:</td>
			<td> <input type='text' name='nombre'></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='descripcion' ></td>
		</tr>
		<tr>
			<td>Tamaño:</td>
			<td><input type='number' name='tamaño' min="5" max="29"></td>
		</tr>
		<tr>
			<td>Precio</td>
			<td><input type='number' name='precio' ></td>
		</tr>
        <tr>
			<td>Id_Profesor:</td>
			<td><input type='number' name='profesor' ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<input type='submit' value='Guardar'>
	
</form>
<br>
<br>
<table class="table table-bordered">
<?php
	include_once("crud/cursos.php");
	include_once("class/cursos.php");
	$crud = new CrudCursos();
	$curso = new Curso();
	$listaCursos = $crud->mostrar();
	print("
	<tr>
			<td>Id_Curso</td>
			<td>Nombre</td>
			<td>Descripcion</td>
			<td>Tamaño de Clase</td>
			<td>Precio</td>
			<td>Nº del Profesor</td>
	</tr>");
	foreach ($listaCursos as $curso) {?>
		
		<tr>
			<td><?php echo $curso->getIdCurso() ?></td>
			<td><?php echo $curso->getNombre() ?></td>
			<td><?php echo $curso->getDescripcion() ?></td>
			<td><?php echo $curso->getTamañoC() ?></td>
			<td><?php echo $curso->getPrecio()?> </td>
			<td><?php echo $curso->getId_prof()?> </td>
			<td><a href="templates/update.php?id=<?php echo $curso->getIdCurso()?>&accion=a">Actualizar</a></td>
			<td><a href="controllers/controller_cursos.php?id=<?php echo $curso->getIdCurso()?>&accion=e">Eliminar</a></td>
		</tr>
	<?php }?>
</table>
<br>
<br>
<table class="table table-bordered">
<?php
	include_once("crud/usuarios.php");
	include_once("class/usuarios.php");
	$crudU = new CrudUsuarios();
	$usuario = new Usuarios();
	$listaUsu = $crudU->mostrar();
	print("
	<tr>
			<td>Id_Usuario</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Email</td>
			<td>pass</td>
			<td>Rool</td>
	</tr>");
	foreach ($listaUsu as $usuario) {?>
		
		<tr>
			<td><?php echo $usuario->getIdUsuario() ?></td>
			<td><?php echo $usuario->getNombre() ?></td>
			<td><?php echo $usuario->getApellido() ?></td>
			<td><?php echo $usuario->getEmail() ?></td>
			<td><?php echo $usuario->getPassword()?> </td>
			<td><?php echo $usuario->getRool()?> </td>
			<td><a href="templates/update.php?id=<?php echo $usuario->getIdUsuario()?>&accion=a">Actualizar</a></td>
			<td><a href="controllers/controller_usuarios.php?id=<?php echo $usuario->getIdUsuario()?>&accion=e">Eliminar</a></td>
		</tr>
	<?php }?>
</table>

<?php
	print_r($listaUsu);
	/* if($crudU->check($_POST["usuario"],$_POST["passw"])){
	} */
	/* print("pitooo  =".$crudU->check("pepe","contraseña")); */
	$u = "pepe";
	$p =  "contraseña";
	$contador=count($listaUsu);
	foreach($listaUsu as $check){
		if($check->getNombre()==$u && $check->getPassword()==$p){
			print("correcto");
			break;
		}
		print($contador);
		$contador-=1;
	}
	if($contador==1){
		print("No");
	}


?>

<?php 
include_once("templates/footer.php");
?>