<?php 
$db ="mysql:host=localhost:3306;dbname=agustinjaimez_DB_tienda";
$usuario ="agus_administrador";
$contraseña="Hi171pq_";
try{
    $mbd = new PDO($db,$usuario, $contraseña);
    $mbd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   $newDB=$mbd->prepare("
    create table if not EXISTS cookie(
        idCurso int AUTO_INCREMENT not null,
        usuario varchar(20),
        contraseña varchar(30),
        rool enum(\"admin\",\"profe\",\"alumno\"),
        primary key (idCurso)
    );
    INSERT into cookie values (default,\"Pepe\",\"12345\",\"admin\");
    INSERT into cookie values (default,\"jose\",\"12345\",\"profe\");
    INSERT into cookie values (default,\"loli\",\"12345\",\"alumno\");
    INSERT into cookie values (default,\"mimi\",\"12345\",\"alumno\");
    ");
    $newDB->execute(); 
    print("exito");
    
}catch (PDOException $e){
    print "Error!: " . $e->getMessage() . "<br>";
}
?>