<?php
session_start();
if (isset($_REQUEST['boton'])) {
    $valor = $_REQUEST['boton'];
    switch ($valor) { 
        
        case 'Volver':
            $_SESSION["fecha"]=date('l jS \of F Y h:i:s A');
            header('Location: http://localhost/Tema_4/2021-22/ejercicios/cookies/index2.php');
            break;
        case 'Salir':
            session_destroy();
            header('Location: http://localhost/Tema_4/2021-22/ejercicios/cookies/index2.php');
            break;
    }
}
?>