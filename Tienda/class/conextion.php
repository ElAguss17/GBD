<?php
	class  Db{
        private static $db ="mysql:host=localhost;dbname=agustinjaimez_True_tienda";
        private static $usuario ="root";
        private static $contraseña="";
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){
            try{
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion= new PDO(self::$db,self::$usuario,self::$contraseña,$pdo_options);
            }catch (PDOException $e){
                print "Error!: " . $e->getMessage() . "<br>";
            }
			return self::$conexion;
		}		
	} 
?>