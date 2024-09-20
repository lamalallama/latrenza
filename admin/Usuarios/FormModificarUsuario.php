<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Datos del Usuario</title>
    <link rel="stylesheet" href="http://localhost/LaTrenza_4DV/EstiloCSS/formulariom.css">
</head>
<body>

<?php
// Conexión a la base de datos
$miConexion = new mysqli("localhost", "root", "", "latrenza");
if ($miConexion->connect_error) {
    die("Error de conexión: " . $miConexion->connect_error);
}

// Recuperar el ID del usuario a editar desde la URL
$IDUsuario = $_GET['IDUsuario'];

// Obtener los datos actuales del usuario
$sql = "SELECT * FROM usuarios WHERE IDUsuario = $IDUsuario";
$resultado = $miConexion->query($sql);

if ($resultado->num_rows > 0) {
    $registro = $resultado->fetch_assoc();

    // Convertir los datos binarios de la imagen en una representación visual
    $imagenBase64 = base64_encode($registro['Foto']);
} else {
    echo "No se encontraron registros con el ID proporcionado";
    exit(); // Termina la ejecución del script si no se encuentra ningún registro
}

// Cerrar la conexión
$miConexion->close();
?>

<section class="registro">
    <h4>Editar Datos del Usuario</h4>
    <form action="ModificarUsuario.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="IDUsuario" value="<?php echo $IDUsuario; ?>"> <!-- Campo oculto para enviar el valor de IDUsuario -->
        
        <!-- Mostrar la imagen actual -->
        Foto actual: <br>
        <img src="data:image/jpeg;base64,<?php echo $imagenBase64; ?>" alt="Foto actual del Usuario" width="100" height="100"><br>
        
        <!-- Permitir al usuario seleccionar una nueva foto -->
        Nueva Foto: <input class="controls" type="file" name="nuevaFoto" id="nuevaFoto"><br>
        
        Nombre: <input class="controls" type="text" name="txtNombre" id="txtNombre" value="<?php echo $registro['Nombre']; ?>"><br>
        
        Correo: <input class="controls" type="email" name="txtCorreo" id="txtCorreo" value="<?php echo $registro['Correo']; ?>"><br>
        
        Contraseña: <input class="controls" type="password" name="txtContrasena" id="txtContrasena" value="<?php echo $registro['Contrasena']; ?>"><br>
        
        <input class="botons" type="submit" value="Actualizar">
    </form>
</section>
</body>
</html>
