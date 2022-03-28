<?php
include "conexion.php";
if(isset($_POST["nombre"]) && isset($_POST["tamaño"]) && isset($_POST["id"])){

    #Variables del formulario
    $id=$_POST["id"];
    $nomb=$_POST["nombre"];
    $desc=$_POST["descripcion"];
    $tama=$_POST["tamaño"];
    
    #consulta
    $resultado=$mbd->prepare("update cursos set nombre=:nombre,descripcion=:descripcion,tamañoC=:tama where idCurso=:id");
    #sustitucion de datos en la consulta
    $resultado->bindValue(':id',$id);
    $resultado->bindValue(':nombre',$nomb);
    $resultado->bindValue(":descripcion", $desc);
    $resultado->bindValue(":tama",$tama);

    $resultado->execute();  
    #Redirecciona a X pagina
    header('Location: https://agustinjaimez.informaticailiberis.com/PDO_base_tienda/index2.php');
}
$mbd = null;
?>