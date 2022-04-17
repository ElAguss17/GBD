<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
    /* table, th, td {
        border: 1px solid black;
      } */
      div{
        margin: 0 auto;
        height: 50%;
        width: 50%;
      }
    </style>
</head>  
<body>
    <div>
    <form action="cookies.php" method="POST">
        <label>Usuario:</label>
        <?php
        if(isset($_COOKIE["nombre"]) && isset($_COOKIE["passw"])){
          print("<input type=\"text\" class=\"form-control\" name=\"usuario\" value=\"".$_COOKIE["nombre"]."\" required><br>");
          print("<label>Contraseña:</label><br>");
          print("<input type=\"password\" class=\"form-control\" name=\"contra\" value=\"".$_COOKIE["passw"]."\" required><br>");
          print("<label>Recordarme:</label><br>");
          print("<input name=\"recor\" value=\"y\" type=\"checkbox\" checked=\"true\"><br>");
          print("<input type=\"submit\" class=\"btn btn-primary\"><br>");
        }else{
          print("<input type=\"text\" class=\"form-control\" name=\"usuario\" required><br>");
          print("<label>Contraseña:</label><br>");
          print("<input type=\"password\" class=\"form-control\" name=\"contra\" required><br>");
          print("<label>Recordarme:</label><br>");
          print("<input name=\"recor\" value=\"y\" type=\"checkbox\"><br>");
          print("<input type=\"submit\" class=\"btn btn-primary\"><br>");
        }
        
        ?>
    </form>
    <br>
		<p>usuario:contraseñas:tipo</p>
		<p>pepe:12345:admin, loli:12345:profe, jose:12345:alumno, mimi:12345:alumno</p>
    </div>
</body>
</html>

