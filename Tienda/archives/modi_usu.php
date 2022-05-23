<?php
include_once("../templates/header_admin.php");?>
<!-- tabla con las clases en la tabla se puede modificar y eliminar -->
<br>
<br>
<br>
<table class="table table-bordered">
<?php
	include_once("../crud/usuarios.php");
	include_once("../class/usuarios.php");
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
			<td><a href="../archives/update_usu.php?idU=<?php echo $usuario->getIdUsuario()?>&accion=a">Actualizar</a></td>
			<td><a href="../controllers/controller_usuarios.php?idU=<?php echo $usuario->getIdUsuario()?>&accion=e">Eliminar</a></td>
		</tr>
	<?php }?>
</table>

<?php include_once("../templates/footer.php");?>