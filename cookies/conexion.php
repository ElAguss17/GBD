<?php 
$db ="mysql:host=localhost:3306;dbname=agustinjaimez_DB_tienda";
$usuario ="agus_administrador";
$contraseña="Hi171pq_";
try{
    $mdb = new PDO($db,$usuario, $contraseña);
    $mdb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
}catch (PDOException $e){
    print "Error!: " . $e->getMessage() . "<br>";
}
?>