<?php
if (session_status() !== 2) {
    session_start();
}
include_once("../crud/usuarios.php");
include_once("../class/usuarios.php");

$crudUs = new CrudUsuarios();
$usuarioo = new Usuarios();

$listaUsu = $crudUs->mostrar();
if(isset($_POST["email"]) && $_POST["password"]){
    print("uno");
    $u=$_POST["email"];
    $p=$_POST["password"];
    if($crudUs->check($u,$p)){
        if(isset($_POST["recordarme"])=="y"){
            setcookie("email",$u,strtotime( '+30 days'),"/");
            setcookie("passw",$p,strtotime( '+30 days'),"/");
            print("sdfa");
        }else{
            print("no");
            setcookie("email",null,strtotime( '+30 days'),"/");
            setcookie("passw",null,strtotime( '+30 days'),"/");
        }
        foreach($listaUsu as $check){
            if($check->getEmail()==$u && $check->getPassword()==$p){
                print("tres");
                $nombre=$check->getNombre();
                $roole=$check->getRool();
                $miD=$check->getIdUsuario();
                $_SESSION["Id"]=$miD;
                $_SESSION["Nombre"]=$nombre;
                $_SESSION["Rool"]=$roole;
            
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