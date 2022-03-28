
<?php
include "conexion.php";
if(isset($_POST["nombre"]) && isset($_POST["tamaño"])){

    #Variables del formulario
    $nomb=$_POST["nombre"];
    $desc=$_POST["descripcion"];
    $tama=$_POST["tamaño"];
    #consulta
    $resultado=$mbd->prepare("insert into cursos values (default,:nombre,:descripcion,:tama)");
    #sustitucion de datos en la consulta
    $resultado->bindValue(':nombre',$nomb);
    $resultado->bindValue(":descripcion", $desc);
    $resultado->bindValue(":tama",$tama);

    $resultado->execute();  

    #Redirecciona a X pagina
    header('Location: http://localhost/Tema_4/2021-22/ejercicios/PDO%20base_tienda/index2.php');
}
$mbd = null;
?>