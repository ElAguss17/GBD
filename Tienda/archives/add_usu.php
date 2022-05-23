<?php
include_once("../templates/header_admin.php");
?>
<br>
<br>
<div class="d-flex justify-content-center" id="registrarse">
<br>
<form action='../controllers/controller_usuarios.php' method='post'>
<br>
    <table>
		<tr>
			<td>Nombre:</td>
			<td> <input type='text' name='nombre'required></td>
		</tr>
		<tr>
			<td>Apellido:</td>
			<td><input type='text' name='apellido'required ></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type='email' name='email'required></td>
		</tr>
		<tr>
			<td>Contraseña</td>
			<td><input type='text' name='password'required ></td>
		</tr>
        <tr>
			<td>Rool:</td>
			<td><select name="rool" required>
					<option value="administrador">Administrador</option>
					<option value="profesor" selected>Profesor</option>
					<option value="alumno">Alumno</option>
				</select>
			</td>
		</tr>
		<input type='hidden' name='insertar2' value='insertar'>
	</table>
	<div class="d-flex justify-content-center" style="margin-bottom:10px" ><input class="btn btn-primary" type='submit' value='Guardar'></div>
	

</form>

</div>
<?php include_once("../templates/footer.php");?>