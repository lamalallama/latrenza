<?php
// En esta sección verificamos cómo se reciben los datos del formulario
print_r($_POST);
print_r($_FILES);

// Se agrega la conexión a la base de datos
$miConexion = new mysqli("localhost", "root", "", "latrenza");

if ($miConexion->connect_error) {
    die("La conexión falló");
} else {
    echo("Conexión exitosa :D");
    echo "<br>";
}
print "<br>";

// Declarar variables para obtener los datos enviados
$Nombre = $_POST['txtNombre'];
$Precio = $_POST['txtPrecio'];
$Stock = $_POST['txtStock'];
$Destacado = $_POST['txtDestacado'];
$Clasificacion = $_POST['txtClasificacion'];

$fotoUrl = "";
if (isset($_FILES['fileFoto']) && $_FILES['fileFoto']['error'] === UPLOAD_ERR_OK) {
    $fotoTmpPath = $_FILES['fileFoto']['tmp_name'];
    $fotoName = $_FILES['fileFoto']['name'];
    $fotoSize = $_FILES['fileFoto']['size'];
    $fotoType = $_FILES['fileFoto']['type'];
    $fotoNameCmps = explode(".", $fotoName);
    $fotoExtension = strtolower(end($fotoNameCmps));

    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fotoExtension, $allowedExtensions)) {
        $uploadFileDir = 'C:/xampp/htdocs/LaTrenza_4DV/admin/Imagenes/Productos/';
        $dest_path = $uploadFileDir . $fotoName;

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

$query = "INSERT INTO `productos` (Nombre, Foto, Precio, Stock, Destacado, Clasificacion) VALUES ('$Nombre', '$fotoUrl', '$Precio', '$Stock', '$Destacado', '$Clasificacion')";

// Se verifica si se registró la información
if ($resultado = mysqli_query($miConexion, $query)) {
    ?>
    <h3>Producto Registrado</h3>
    <a href="<?= ROOTURL ?>?accion=VerProductos" target="_blank">Ir a la lista de productos</a>
    <?php
} else {
    ?>
    <h3>Hubo un error</h3>
    <?php
}
?>
