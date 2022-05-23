<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen"/>
    <script language="JavaScript" type="text/javascript">
      function login(showhide){
        if(showhide == "show"){
          document.getElementById('session').style.visibility="visible";
          return false;d
        }else if(showhide == "hide"){
            document.getElementById('session').style.visibility="hidden";
            return false;
        }
      }
      function iniciar(){
        alert("Inicie sesion para acceder");
      }
    </script>
</head>  
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <!-- Cambiar -->
    <label><img class="Logo" src="http://localhost/Tema_4/2021-22/Tienda/img/logo.png"style="height:35px;width:35px;"></label>
        <button class="navbar-toggler hidden-lg-up" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index2.php">Home <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return iniciar()">Ver carrito</a>
            </li>
          </ul>
          <form class="d-flex my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="return login('show')">Iniciar sesión</button>
          </form>
        </div>
      </div>
    </nav>
    </div>
    <br>
    <br>
<?php 
  if(isset($_COOKIE['email']) && isset($_COOKIE['passw'])){
    print("<div id=\"session\">
    <div id=\"sessionhijo\"class=\"col-md-4 float-right-top\">
    <button class=\"btn btn-primary float-right\" id=\"close\" onclick=\"return login('hide')\"></button>
    <form action=\"archives/inicio_session.php\" method=\"POST\">
    <div class=\"mb-3\">
      <label for=\"exampleInputEmail1\" class=\"form-label\">Email</label>
      <input type=\"email\" class=\"form-control\" id=\"email1\" aria-describedby=\"emailHelp\" name=\"email\" value=\"".$_COOKIE['email']."\">
      <br>
      <label for=\"exampleInputPassword1\" class=\"form-label\">Contraseña</label>
      <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" name=\"password\" value=\"".$_COOKIE['passw']."\">
      <br>
      <input type=\"checkbox\" class=\"form-check-input\" id=\"exampleCheck1\" name=\"recordarme\" checked=\"true\"  value=\"y\">
      <label class=\"form-check-label\" for=\"exampleCheck1\">Recordarme</label>
      <br>
      No tienes cuenta? <a href=\"registrarse.php\">Crear Una</a>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\">Iniciar</button>
    </form>
    </div>
  </div>
  <br>");
  }else{
    print("<div id=\"session\">
    <div id=\"sessionhijo\"class=\"col-md-4 float-right-top\">
    <button class=\"btn btn-primary float-right\" id=\"close\" onclick=\"return login('hide')\"></button>
    <form action=\"archives/inicio_session.php\" method=\"POST\">
    <div class=\"mb-3\">
      <label for=\"exampleInputEmail1\" class=\"form-label\">Email</label>
      <input type=\"email\" class=\"form-control\" id=\"email1\" aria-describedby=\"emailHelp\" name=\"email\" value=\"\">
      <br>
      <label for=\"exampleInputPassword1\" class=\"form-label\">Contraseña</label>
      <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" name=\"password\">
      <br>
      <input type=\"checkbox\" class=\"form-check-input\" id=\"exampleCheck1\" name=\"recordarme\"  value=\"y\">
      <label class=\"form-check-label\" for=\"exampleCheck1\">Recordarme</label>
      <br>
      No tienes cuenta? <a href=\"registrarse.php\">Crear Una</a>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\">Iniciar</button>
    </form>
    </div>
  </div>
  <br>");
  }
?>
