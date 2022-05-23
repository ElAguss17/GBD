<?php 
if (session_status() !== 2) {
    session_start();
}
if(isset($_SESSION["Rool"]) && isset($_SESSION["Nombre"])){
  switch ($_SESSION["Rool"]) {
    case "alumno":
        include_once("../templates/header_alum.php");
        break;
    case "profesor":
        include_once("../templates/header_profe.php");
        break;
    case "administrador":
        include_once("../templates/header_admin.php");
        break;
}
}
?>
<?php
//incluye la clase Libro y CrudLibro
    include_once("../crud/cursos.php");
    include_once("../class/cursos.php");
    $crud = new CrudCursos();
    $curso = new Curso();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$curso=$crud->obtenerCurso($_GET['id']);
?>
<br><br><br>
<div class="d-flex justify-content-center" id="registrarse">
<br>
<form action='../controllers/controller_cursos.php' method='post'>
	<table>
		<tr>
			<input type='hidden' name='id'required value='<?php echo $curso->getIdCurso()?>'>
			<td>Nombre:</td>
			<td> <input type='text' name='nombre'required value='<?php echo $curso->getNombre()?>'></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='descripcion'required value='<?php echo $curso->getDescripcion()?>' ></td>
		</tr>
		<tr>
			<td>Tamaño de la clase:</td>
			<td><input type='number' name='tamaño'  min="5" max="29" required value='<?php echo $curso->getTamañoC()?>'></td>
		</tr>
		<tr>
			<td>Precio:</td>
			<td><input type='number' name='precio'required value='<?php echo $curso->getPrecio() ?>'></td>
		</tr>
        <tr>
			<td><input type='hidden' name='profesor'required value='<?php echo $curso->getId_prof() ?>'></td>
		</tr>
		<input type='hidden' name='actualizar' value'actualizar'>
	</table>
	<input type='submit' value='Guardar'>
</form>

</div>
<?php 
include_once("../templates/footer.php");
?>