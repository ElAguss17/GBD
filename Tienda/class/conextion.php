<?php
	class  Db{
        private static $db ="mysql:host=localhost:3306;dbname=agustinjaimez_True_tienda";
		private static $usuario ="agus_tienda_admin";
		private static $contraseña="Cxb7n3!2";
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