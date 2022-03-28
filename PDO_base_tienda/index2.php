<?php
    include "conexion.php";

?>
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
    <h2>Insertar Datos</h2>
    <form action="introducir.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" required><br>
        <label>Descripcion:</label><br>
        <textarea type="text" class="form-control" name="descripcion" maxlength="79" placeholder="Descripcion de la clase"></textarea><br>
        <label>Tamaño de la clase:</label>
        <input type="number" class="form-control" name="tamaño" max="30" min="5" placeholder="Min:5 Max:30" value="5" required><br>
        <input type="submit" class="btn btn-primary"><br><br>
    </form>
    <br><br>
    <h2>Update Datos</h2>
    <form action="update.php" method="POST">
        <label>Id que desea actualizar:</label>
        <select class="form-select" name="id">
        <?php
            $consulta=$mbd->query("select idCurso from cursos",PDO::FETCH_ASSOC);
            foreach($consulta as $fila){
                foreach($fila as $columna){
                    print("<option value=".$columna.">".$columna."</option>");
                }
            }
        ?>
        </select><br>
        <label>Nuevo Nombre:</label>
        <input type="text" name="nombre" class="form-control" required><br>
        <label>Nueva Descripcion:</label><br>
        <textarea type="text" class="form-control" name="descripcion" maxlength="79" placeholder="Descripcion de la clase"></textarea><br>
        <label>Nuevo Tamaño de la clase:</label>
        <input type="number" class="form-control" name="tamaño" max="30" min="5" placeholder="Min:5 Max:30" value="5" required><br>
        <input type="submit" class="btn btn-primary"><br><br>
    </form>
    <br><br>
    <h2>Eliminar</h2>
    <form action="delete.php" method="POST">
    <label>Id que desea eliminar:</label>
        <select class="form-select" name="id">
        <?php
            $consulta=$mbd->query("select idCurso from cursos",PDO::FETCH_ASSOC);
            foreach($consulta as $fila){
                foreach($fila as $columna){
                    print("<option value=".$columna.">".$columna."</option>");
                }
            }
        ?>
        </select><br>
        <input type="submit" class="btn btn-primary"><br><br>
    </form>
    <br><br>
    <h1>*crear tabla Profesores y añadir idProfesores a la tabla de cursos*</h1> 
        <?php

             print("<table class=\"table table-success table-striped table-bordered border-primary\">");
             $consulta2 = $mbd->query("select * from cursos",PDO::FETCH_NUM);
             foreach($consulta2 as $fila2){
                 print_r("<tr>");
                 foreach($fila2 as $dato){
                    print_r("<th scope=\"col\">" . $dato . "</th>");
                }
                 print_r("</tr>");
             }
             print("</table>");
             $mbd=null;
        ?>
        
    </div>
</body>
</html>

