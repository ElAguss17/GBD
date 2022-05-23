<?php
/* como tengo problemas con las susperpociciones de las sessiones compruebo q no se ahayan iniciado */
if (session_status() !== 2) {
        session_start();
    }
/* comprobamos q el Rool es Administrador para q el header del Admin no pueda salir en un usu Profesor */
if(!isset($_SESSION['Rool'])){
  header('Location: https://agustinjaimez.informaticailiberis.com/Tienda/index2.php');
}else{
  if($_SESSION['Rool']!='administrador'){
    header('Location: https://agustinjaimez.informaticailiberis.com/Tienda/index2.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuarios</title>
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
    </script>
</head>  
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <!-- Cambiar enlace por el de plex -->
      <label><img class="Logo" src="https://agustinjaimez.informaticailiberis.com/Tienda/img/logo.png"style="height:35px;width:35px;"></label>
        <button class="navbar-toggler hidden-lg-up" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item active">
               <!-- Cambiar enlace por el de plex -->
              <a class="nav-link" href="https://agustinjaimez.informaticailiberis.com/Tienda/index2.php">Home <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Ver carrito</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editar Clases</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <!-- Cambiar enlace por el de plex -->
                <a class="dropdown-item" href="https://agustinjaimez.informaticailiberis.com/Tienda/archives/add_clase.php">Añadir</a>
                <!-- Cambiar enlace por el de plex -->
                <a class="dropdown-item" href="https://agustinjaimez.informaticailiberis.com/Tienda/archives/modi_clase.php">Editar</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editar Usuarios</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <!-- Cambiar enlace Plex -->
                <a class="dropdown-item" href="https://agustinjaimez.informaticailiberis.com/Tienda/archives/add_usu.php">Añadir</a>
                <!-- Cambiar enlace por el de plex -->
                <a class="dropdown-item" href="https://agustinjaimez.informaticailiberis.com/Tienda/archives/modi_usu.php">Editar</a>
              </div>
            </li>
          </ul>
          <form action="<?php basename($_SERVER['PHP_SELF']);?>" method="POST" class="d-flex my-2 my-lg-0" >
            <label  style="color: white;margin-right: 10px;margin-top: 7px;" for="Nombre" ><?php
             print($_SESSION["Nombre"]);
             if(isset($_REQUEST['salir'])){
               if($_REQUEST['salir'] == "salir"){
                 unset($_SESSION["Nombre"]);
                 unset($_SESSION["Rool"]);
                 #$session_destroy();
                 /*Cambiar enlace por el de plex */
                 header('Location: https://agustinjaimez.informaticailiberis.com/Tienda/index2.php');      
               }
             }
            ?></label>
            <button class="btn btn-outline-success my-2 my-sm-0" name="salir" value="salir" type="submit" style="color:white; background:red;">Cerrar sesión</button>
          </form>
        </div>
      </div>
</nav>
    </div>
    