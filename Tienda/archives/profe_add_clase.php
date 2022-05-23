<?php
include_once("../templates/header_profe.php");
?><br>
<br>
<div class="d-flex justify-content-center" id="registrarse">
<br>
<form action='../controllers/controller_cursos.php' method='post'>
<br>
    <table>
		<tr>
			<td>Nombre:</td>
			<td> <input type='text' name='nombre' required></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='descripcion'required ></td>
		</tr>
		<tr>
			<td>Tamaño:</td>
			<td><input type='number' name='tamaño' min="5" max="29"required></td>
		</tr>
		<tr>
			<td>Precio</td>
			<td><input type='number' name='precio' required></td>
		</tr>
        <tr>
			<td><input type='hidden' type='number' name='profesor'value='<?php print($_SESSION['Id']); ?>' ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<div class="d-flex justify-content-center" style="margin-bottom:10px" ><input class="btn btn-primary" type='submit' value='Guardar'></div>
	

</form>

</div>
<?php include_once("../templates/footer.php");?>