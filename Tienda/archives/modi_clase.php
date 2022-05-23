<?php
include_once("../templates/header_admin.php");?>
<!-- tabla con las clases en la tabla se puede modificar y eliminar -->
<br>
<br>
<br>
<table class="table table-bordered">
<?php
	include_once("../crud/cursos.php");
	include_once("../class/cursos.php");
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
			<td><a href="../archives/update_clase.php?id=<?php echo $curso->getIdCurso()?>&accion=a">Actualizar</a></td>
			<td><a href="../controllers/controller_cursos.php?id=<?php echo $curso->getIdCurso()?>&accion=e">Eliminar</a></td>
		</tr>
	<?php }?>
</table>

<?php include_once("../templates/footer.php");?>