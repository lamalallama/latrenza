<?php
// Verificar cómo se reciben los datos del formulario
print_r($_POST);
print_r($_FILES);

// Conexión a la base de datos
$miConexion = new mysqli("localhost", "root", "", "latrenza");

if ($miConexion->connect_error) {
    die("La conexión falló: " . $miConexion->connect_error);
} else {
    echo "Conexión exitosa :D";
    echo "<br>";
}

// Declarar variables para obtener los datos enviados
$Nombre = $_POST['txtNombre'];
$Correo = $_POST['txtCorreo'];
$Contrasena = $_POST['txtContrasena'];

// Hashear la contraseña para mayor seguridad
$hashedContrasena = password_hash($Contrasena, PASSWORD_BCRYPT);

$fotoUrl = "";

// Verificar si se subió una foto y manejar la carga del archivo
if (isset($_FILES['fileFoto']) && $_FILES['fileFoto']['error'] === UPLOAD_ERR_OK) {
    $fotoTmpPath = $_FILES['fileFoto']['tmp_name'];
    $fotoName = $_FILES['fileFoto']['name'];
    $fotoNameCmps = explode(".", $fotoName);
    $fotoExtension = strtolower(end($fotoNameCmps));

    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fotoExtension, $allowedExtensions)) {
        $uploadFileDir = 'C:/xampp/htdocs/LaTrenza_4DV/admin/Imagenes/Usuarios/';
        $uniqueName = uniqid('user_') . '.' . $fotoExtension;
        $dest_path = $uploadFileDir . $uniqueName;

        if (move_uploaded_file($fotoTmpPath, $dest_path)) {
            $fotoUrl = $dest_path;
        } else {
            echo 'Error al mover el archivo subido al destino.';
        }
    } else {
        echo 'Tipo de archivo no permitido. Sólo se permiten: ' . implode(',', $allowedExtensions);
    }
} else {
    echo 'Error en la subida del archivo: ' . $_FILES['fileFoto']['error'];
}

// Consulta SQL para insertar el usuario en la base de datos
$query = "INSERT INTO `usuarios` (Nombre, Correo, Contrasena, Foto) VALUES ('$Nombre', '$Correo', '$hashedContrasena', '$fotoUrl')";

// Verificar si se registró la información correctamente
if ($resultado = mysqli_query($miConexion, $query)) {
    ?>
    <h3>Usuario Registrado Exitosamente</h3>
    <a href="<?= ROOTURL ?>?accion=VerUsuarios" target="_blank">Ir a la lista de usuarios</a>
    <?php
} else {
    echo "<h3>Hubo un error: " . mysqli_error($miConexion) . "</h3>";
}
?>
