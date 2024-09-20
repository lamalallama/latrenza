<?php
// Verificar cómo se reciben los datos del formulario
print_r($_POST);

// Conexión a la base de datos
$miConexion = new mysqli("localhost", "root", "", "latrenza");

if ($miConexion->connect_error) {
    die("La conexión falló: " . $miConexion->connect_error);
} else {
    echo "Conexión exitosa :D";
    echo "<br>";
}

// Declarar variables para obtener los datos enviados
$IDVenta = $_POST['txtIDVenta'];
$IDProducto = $_POST['txtIDProducto'];
$IDUsuario = $_POST['txtIDUsuario'];
$IDEmpleado = $_POST['txtIDEmpleado'];
$Precio = $_POST['txtPrecio'];
$Cantidad = $_POST['txtCantidad'];
$Importe = $_POST['txtImporte'];
$FechaVenta = $_POST['txtFechaVenta'];
$FechaCancelacion = $_POST['txtFechaCancelacion'];

// Consulta SQL para insertar la venta en la base de datos
$query = "INSERT INTO `ventas` (IDVenta, IDProducto, IDUsuario, IDEmpleado, Precio, Cantidad, Importe, FechaVenta, FechaCancelacion) VALUES ('$IDVenta', '$IDProducto', '$IDUsuario', '$IDEmpleado', '$Precio', '$Cantidad', '$Importe', '$FechaVenta', '$FechaCancelacion')";

// Verificar si se registró la información correctamente
if ($resultado = mysqli_query($miConexion, $query)) {
    ?>
    <h3>Venta Registrada Exitosamente</h3>
    <a href="<?= ROOTURL ?>?accion=VerVentas" target="_blank">Ir a la lista de ventas</a>
    <?php
} else {
    echo "<h3>Hubo un error: " . mysqli_error($miConexion) . "</h3>";
}
?>
