<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    

<?php
    if(isset($_POST["usuario"]) && isset($_POST["contra"])){
        $usuario_coo=$_POST["usuario"];
        $contra_coo=$_POST["contra"];
        #$recor = $_POST["recor"];

        include_once "conexion.php";
        
        $usu = $mdb->prepare("select * from cookie where usuario like :usuario and contraseña like :contra");
        $usu->bindValue(":usuario",$usuario_coo,PDO::PARAM_STR);
        $usu->bindValue(":contra",$contra_coo,PDO::PARAM_STR);
        $usu->execute();
        foreach ($usu as $dato){
              $rool=($dato["rool"]);
        }
        if($usu->rowCount()>0 && $usu->rowCount()<2){
            $_SESSION["usuario"]=$usuario_coo;
            if(!isset($_SESSION["fecha"])){
                $_SESSION["fecha"]=date('l jS \of F Y h:i:s A');
            }    
            print("<div class=\mb-3\">"); 
            print("<form action=\"sesion.php\" method=\"POST\">");
            print("<label class=\"form-label\">".$_SESSION["usuario"]." has iniciado como ".$rool."</label><br>");
            print("<p>Tu ultima sesion fue ".$_SESSION["fecha"]."</p><br>");
            print("<input type=\"submit\" class=\"btn btn-primary\" name=\"boton\" value=\"Volver\"><br>");
            print("<input type=\"submit\" class=\"btn btn-primary\" name=\"boton\" value=\"Salir\"><br>");
            #print("<a class=\"btn btn-primary\" href=\"http://localhost/Tema_4/2021-22/ejercicios/cookies/index2.php\" role=\"button\">Volver</a>");
            print("</form>");
            print("</div>");
            if(isset($_POST["recor"])){
                setcookie("nombre",$usuario_coo,time()+(60*60*24));
                setcookie("passw",$contra_coo,time()+(60*60*24));
            }else{
                setcookie("nombre",$usuario_coo,time()-(60*60*24));
                setcookie("passw",$contra_coo,time()-(60*60*24));
            }

        }else{
            print("No existe ese usuario");
            print("<a class=\"btn btn-primary\" href=\"http://localhost/Tema_4/2021-22/ejercicios/cookies/index2.php\" role=\"button\">Volver</a>");
        }
    }
?>
</body>
</html>