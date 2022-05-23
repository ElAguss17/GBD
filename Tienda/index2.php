<?php
/* determinar q header conforme al usuario */
if (session_status() !== 2) {
    session_start();
}
if(isset($_SESSION["Rool"]) && isset($_SESSION["Nombre"])){
  switch ($_SESSION["Rool"]) {
    case "alumno":
        include_once("templates/header_alum.php");
        break;
    case "profesor":
        include_once("templates/header_profe.php");
        break;
    case "administrador":
        include_once("templates/header_admin.php");
        break;
}
}else{
  include_once("templates/header.php");
}
?>
<br>
<br>
<br>
    <div class="container">
        <div class=row>
            <div class="col-3">
                <div class="card">
                    <img
                    title="Titulo del producto" 
                    alt="Titulo"
                    class="card-img-top" src="img/chimp.jpg">
                    <div class="card-body">
                        <span>Titulo</span>
                        <h5 class="card-title">30€</h5>
                        <p class="card-text">Descripcion</p>
                        <button type="submit" class="btn btn-dark" name="btnAccion" value="Agregar" >Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once("templates/footer.php");?>