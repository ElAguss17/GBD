<?php

include_once("crud/usuarios.php");
include_once("class/usuarios.php");

$crudUs = new CrudUsuarios();
$usuarioo = new Usuarios();
$u=$_POST["email"];
$p=$_POST["password"];
$listaUsu = $crudUs->mostrar();
if(isset($_POST["email"]) && $_POST["password"]){
    if($crudUs->check($u,$p)){
        foreach($listaUsu as $check){
            if($check->getEmail()==$u && $check->getPassword()==$p){
                $nombre=$check->getNombre();
                $roole=$check->getRool();
                $_SESSION["Nombre"]=$nombre;
                $_SESSION["Rool"]=$roole;
                setcookie("Nombre",$nombre,strtotime( '+30 days' ));
                setcookie("Rool",$roole,strtotime( '+30 days' ));
                print_r(isset($_POST["recordarme"]));
                /* if(isset($_POST["recordarme"])){
                
                } */
                header('Location: http://localhost/Tema_4/2021-22/Tienda/index2.php');
            }
        }
    }else{
        print("El usuario o la contraseña es incorrecto");
        print("<a href=\"http://localhost/Tema_4/2021-22/Tienda/index2.php\">Volver</a>");
    }
}else{
    print("Introduzca Correo y Contraseña");
    print("<br><a href=\"http://localhost/Tema_4/2021-22/Tienda/index2.php\">Volver</a>");
}
?>