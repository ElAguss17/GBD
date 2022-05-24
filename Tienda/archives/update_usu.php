<?php 
include_once("../templates/header_admin.php");
?>
<?php
//incluye la clase Libro y CrudLibro
    include_once("../crud/usuarios.php");
    include_once("../class/usuarios.php");
    $crud = new CrudUsuarios();
    $curso = new Usuarios();
	print_r($curso=$crud->obtenerUsuario($_GET['id']));
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$curso=$crud->obtenerUsuario($_GET['id']);
?>
<br><br><br>
<div class="d-flex justify-content-center" id="actualizar">
<br>
<form action='../controllers/controller_usuarios.php' method='post'>
	<table>
		<tr>
			<input type='hidden' name='idU' value='<?php echo $curso->getIdUsuario()?>'>
			<td>Nombre:</td>
			<td> <input type='text' name='nombre'required value='<?php echo $curso->getNombre()?>'></td>
		</tr>
		<tr>
			<td>Apellido:</td>
			<td><input type='text' name='descripcion'required value='<?php echo $curso->getApellido()?>' ></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type='email' name='tamaño'required value='<?php echo $curso->getEmail()?>'></td>
		</tr>
		<tr>
			<td>Contraseña:</td>
			<td><input type='text' name='precio'required value='<?php echo $curso->getPassword() ?>'></td>
		</tr>
        <tr>
			<td>Rool</td>
			<td><input type='text' name='profesor'required value='<?php echo $curso->getRool() ?>'></td>
		</tr>
		<input type='hidden' name='actualizar' value'actualizar'>
	</table>
	<input type='submit' value='Guardar'>
</form>

</div>
<?php 
include_once("../templates/footer.php");
?>