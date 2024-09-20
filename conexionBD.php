<?php
//ESTE ARICHO SE LLAMA conexionBD.php
//este archivo es de la conexion a la base de datos
//desde la interfaz del cliente

$miConexion = new mysqli('localhost','root','','latrenza');

if($miConexion->connect_error){
    die("La conexion fallo");
}
else{
    // echo ("Conexion exitosa :D");
}
    echo "<br>";
?>