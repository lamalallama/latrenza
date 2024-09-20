<?php
//Aqui estaran mis variables globales

// SINTAXIS
//define ('NOMBREVARIABLES', 'VALOS');
	
//EJEMPLO

	define('MIVARIABLEGLOBAL','HOLA, soy irlanda');
	
//Autor del codigo
	define('AUTOR','Tabares Huato Irlanda ');
	
//Nombre de sitio web
	define('SITENAME','latrenza.com');
	
//Ruta del sitio
	define('ROOTURL','http://localhost/LaTrenza_4DV/admin/');
	
	//Ruta fisica de mi carpeta de trabajo, dentro del disco duro
	define('DOCROOT',$_SERVER['DOCUMENT_ROOT'].'/LaTrenza_4DV/admin/');
//$_SERVER['DOCUMENT_ROOT'] : Ruta direccta a archivos

//VARIABLES PARA LA CONSTRUCCION CON BASE DE DATOS
	
	define('DBHOST','localhost'); //nombre del servidor
	define('DBUSER','root'); //nombre de usuario
	define('DBPASSWD',''); //contraseña
	define('DBNAME','latrenza'); //nombre de la base de datos

//VARIABLES PARA LAS RUTAS MI header.php y footer.php
	define('HEADERADMIN',DOCROOT.'header.php');
	define('FOOTERADMIN',DOCROOT.'footer.php');
	
//VARIABLES PARA IMAGENES GENERALES, ARCHIVOS DE DISEÑO (.css), ARCHIVOS DE ANIMACIONES Y VALIDACION DE DATOS (.js)
	define('IMAGENES',ROOTURL.'imagenes/'); //logo,autor,etc
	define('CSS',ROOTURL.'CSS/'); //archivos de diseño
	define('JS',ROOTURL.'JS/'); //archivos de javascript
	
//Aqui se incluye el archivo de funciones para que sea ejecutado en toda la app web
	include('funciones.php');
?>