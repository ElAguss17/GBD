<?php
include "conexion.php";
if(isset($_POST["id"])){

    #Variables del formulario
    $id=$_POST["id"];    
    #consulta
    $resultado=$mbd->prepare("delete from cursos where idCurso=:id");
    #sustitucion de datos en la consulta
    $resultado->bindValue(':id',$id);
    $resultado->execute();  

    #Redirecciona a X pagina
    header('Location: https://agustinjaimez.informaticailiberis.com/PDO_base_tienda/index2.php');
}
$mbd = null;
?>