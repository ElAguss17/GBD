<?php 
include_once("templates/header.php");
?>
<div class="d-flex justify-content-center" id="registrarse">
<br>
<form action='controllers/controller_usuarios.php' method='post'>
<br>
	<table>
		<tr>
			<td>Nombre:</td>
			<td> <input type='text' name='nombre' required></td>
		</tr>
		<tr>
			<td>Apellido:</td>
			<td><input type='text' name='apellido'required></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type='text' name='email'required></td>
		</tr>
        <tr>
			<td>Contraseña:</td>
			<td><input type='text' name='passw' required></td>
		</tr>
        <tr>
			<td>Repetir Contraseña:</td>
			<td><input type='text' name='passw2'required></td>
		</tr>
		<tr>
			<td><input type='hiden' name='rool' value="alumno"></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<div class="d-flex justify-content-center" style="margin-bottom:10px" ><input class="btn btn-primary" type='submit' value='Guardar'></div>
	<a class="btn btn-primary" href="index2.php" style="
    margin-right: 10px;
    margin-left:  10px;
    margin-top:  10px;
    margin-bottom:  10px;">Volver</a><br>

</form>

</div>
<?php 
include_once("templates/footer.php");
?>