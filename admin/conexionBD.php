<?php
//ESTE ARICHO SE LLAMA conexionBD.php

$miConexion = new mysqli(DBHOST,DBUSER,DBPASSWD,DBNAME);

if($miConexion->connect_error)
{
    die("La conexion fallo");
}
else
{
    //echo ("Conexion exitosa :D");
}
    echo "<br>";
?>