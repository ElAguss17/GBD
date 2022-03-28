<?php 
$db ="mysql:host=localhost:3306;dbname=agustinjaimez_DB_tienda";
$usuario ="agus_administrador";
$contraseña="Hi171pq_";
try{
    $mbd = new PDO($db,$usuario, $contraseña);
    $mbd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $newDB=$mbd->prepare("
    create table if not EXISTS cursos(
        idCurso int AUTO_INCREMENT not null,
        nombre varchar(20),
        descripcion varchar(80),
        tamañoC int(2) check (tamañoC<30 and tamañoC>4),
        PRIMARY KEY (idCurso)
    );
    INSERT into cursos values (default,\"Cripto\",\"Clases de criptografia\",20);
    INSERT into cursos values (default,\"Mates\",\"Clases de Mates\",25);
    INSERT into cursos values (default,\"Ingles\",\"Clases de ingles\",20);
    INSERT into cursos values (default,\"Quimica\",\"Clases de quimica\",10);

    ");
    $newDB->execute();
    print("exito");
    
}catch (PDOException $e){
    print "Error!: " . $e->getMessage() . "<br>";
}
?>
