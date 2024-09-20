<?php
//este archivo se llama procesoIniciarSesion

require_once("../Configuracion.php");
include("../conexionBD.php");


//aqui varifico como recibi los datos del formulario\
//de inicio de sesion

print_r($_POST);

$accion= $_POST['accion']
$NombreUsuario = $_POST['txtNombreUsuario'];
$$Contrasena= $_POST['txtContrasena'];

$query = "SELECT IDEmpleado, APaterno, AMaterno, Nombre, Edad, Puesto, NombreUsuario,Contrasena FROM emoleados WHERE NombreUsuario='$NombreUsuario' AND Contrasena='Contrasena'"



?>