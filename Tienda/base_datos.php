<?php 
$db ="mysql:host=localhost:3306;dbname=agustinjaimez_True_tienda";
$usuario ="agus_tienda_admin";
$contraseña="Cxb7n3!2";
try{
    $mbd = new PDO($db,$usuario, $contraseña);
    $mbd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $newDB=$mbd->prepare("
    CREATE TABLE IF NOT EXISTS `agustinjaimez_True_tienda`.`usuarios` (
        `idUsuario` INT auto_increment NOT NULL,
        `nombre` VARCHAR(30) not NULL,      
        `apellido` VARCHAR(30) not NULL,
        `email` varchar(50) not null,
        `password` varchar(35) not null,
        `rool` set('administrador','profesor','alumno') NOT NULL default('alumno'),
        PRIMARY KEY (`idUsuario`));
          
    CREATE TABLE IF NOT EXISTS `agustinjaimez_True_tienda`.`profes_` (
        `idUsuario` INT,
        `especialidad` VARCHAR(45) NULL,
	  CONSTRAINT `fk_usuarios_usuaro+1`
		FOREIGN KEY (`idUsuario`)
		REFERENCES `agustinjaimez_True_tienda`.`usuarios` (`idUsuario`)
		ON DELETE cascade
		ON UPDATE cascade	
        );      
        
	CREATE TABLE IF NOT EXISTS `agustinjaimez_True_tienda`.`cursos` (
        `idCurso` INT auto_increment not NULL,
        `nombre` VARCHAR(45) not NULL,
        `descripcion` VARCHAR(45) not NULL,
        `tamañoC` INT NOT NULl check(tamañoC >= 5 && tamañoC < 31),
        `precio` int,
        `id_prof` INT default(0),
        PRIMARY KEY (`idCurso`),
		INDEX `fk_cursos_profes_1_idx` (`id_prof` ASC) ,
		CONSTRAINT `fk_cursos_profes_1`
		FOREIGN KEY (`id_prof`)
		REFERENCES `agustinjaimez_True_tienda`.`profes_` (`idUsuario`)
		ON DELETE set null 
		ON UPDATE cascade);

    CREATE TABLE IF NOT EXISTS `agustinjaimez_True_tienda`.`adquiere` (
        `cursos_idCurso` INT ,
        `usuarios_idUsuario` INT,
        `fecha` date not null,
        PRIMARY KEY (`cursos_idCurso`, `usuarios_idUsuario`),
        INDEX `fk_cursos_has_usuarios_usuarios1_idx2` (`usuarios_idUsuario` ASC) ,
        INDEX `fk_cursos_has_usuarios_cursos_idx2` (`cursos_idCurso` ASC) ,
        CONSTRAINT `fk_cursos_has_usuarios_cursos2`
          FOREIGN KEY (`cursos_idCurso`)
          REFERENCES `agustinjaimez_True_tienda`.`cursos` (`idCurso`)
          ON DELETE no action
          ON UPDATE cascade,
        CONSTRAINT `fk_cursos_has_usuarios_usuarios12`
          FOREIGN KEY (`usuarios_idUsuario`)
          REFERENCES `agustinjaimez_True_tienda`.`usuarios` (`idUsuario`)
          ON DELETE no action
          ON UPDATE cascade);
      
    insert into `agustinjaimez_True_tienda`.`usuarios` values (default,'jorge','fernandez','aaa@gmail.com','a','alumno'),
    (default,'pepe','fernandez','abb@gmail.com','a','profesor'),
    (default,'chill','fernandez','abc@gmail.com','a','administrador');

    insert into `agustinjaimez_True_tienda`.`profes_` values (1,'mates'),(2,'mates'),(3,'mates');
        
    insert into `agustinjaimez_True_tienda`.`cursos` values (default,'ingles','Clases ingles',11,12,1),
    (default,'mates','Clases ingles',10,12,2),
    (default,'lengua','Clases ingles',10,12,3);


    insert into `agustinjaimez_True_tienda`.`adquiere` values (1,1,current_date()),(1,3,current_date()),(1,2,current_date());
    ");
    $newDB->execute();
    print("exito");
    
}catch (PDOException $e){
    print "Error!: " . $e->getMessage() . "<br>";
}
?>

