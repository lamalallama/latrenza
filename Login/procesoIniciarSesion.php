<?php
require_once("../configuracion.php");
include('../conexionBD.php');

session_start(); // Inicia la sesión

$Nombre = $_POST['txtNombre'];
$Contrasena = $_POST['txtContrasena'];

$query = "SELECT `IDUsuario`, `Foto` `Nombre`, `Correo`, `Contrasena` FROM `usuarios` WHERE Nombre='$Nombre' AND Contrasena='$Contrasena'";

$resultado = mysqli_query($miConexion, $query);

if(!$resultado || mysqli_num_rows($resultado) == 0) {
?>
    <center>
        <h2>Error al intentar Iniciar sesión</h2>
        <input type="button" value="Ir al formulario de inicio de sesión" onclick="window.location.href='<?= ROOTURL ?>'" />
    </center>
<?php
} else {
    $datosUsuario = mysqli_fetch_assoc($resultado);
    $_SESSION['user_session'] = $datosUsuario;
    header("Location: " . ROOTURL); // Redirige al usuario a la página principal
    exit; // Termina el script para evitar ejecución adicional
}
?>
