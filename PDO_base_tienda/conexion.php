<?php

$db ="mysql:host=localhost:3306;dbname=agustinjaimez_DB_tienda";
$usuario ="agus_administrador";
$contraseña="Hi171pq_";
try{
    $mbd = new PDO($db,$usuario, $contraseña);
    $mbd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
}catch (PDOException $e){
    print "Error!: " . $e->getMessage() . "<br>";
}
?>
