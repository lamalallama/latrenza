<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="css/login.css">
</head>
</html>
<?php
//enviados en el formularioEmpleado.php

//Aqui verifico como se reciben los datos

print_r($_POST);
//Se agrega la conexion a la base de datos
//el ../ quiere decir salir de la carpeta actual
$miConexion = new mysqli("localhost" , "root" , "" , "latrenza");

if($miConexion->connect_error){
    die("La conexion fallo");
}
else{
    echo("Conexion exitosa :D");
    echo "<br>";
}
print "<br>";

//Declarar variable para obtener los datos enviados
//La variable POST es un arreglo

$Foto = '0.png';
$Nombre = $_POST['txtNombre'];
$Contrasena = $_POST['txtContrasena'];
$Correo = $_POST['txtCorreo'];

$query = "INSERT INTO `usuarios` (Foto, Nombre, Contrasena, Correo) VALUES ('$Foto', '$Nombre', '$Contrasena', '$Correo')";

//Se verifica si se registo la informacion
if($resultado = mysqli_query($miConexion, $query)){
    ?>
    <h3>"Usuario Registrado"</h3>
    <a href='<?=ROOTURL?>' target="_blank">Regresar a la pantalla principal</a>
    <?php
}
else{
    ?>
    <h3>"Hubo un error"</h3>
<?php }
?>