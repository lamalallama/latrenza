<?php
// Incluir el archivo de conexión a la base de datos
require('C:/xampp/htdocs/LaTrenza_4DV/conexionBD.php');

// Recuperar el ID de la venta a eliminar desde la URL
$id = $_GET['no'];

// Crear la sentencia SQL para eliminar la venta
$sentencia = "DELETE FROM ventas WHERE IDVenta = '".$id."' ";

// Ejecutar la sentencia SQL y verificar si fue exitosa
if(mysqli_query($miConexion, $sentencia)) {
    echo "<br/> Venta Eliminada Exitosamente";
    ?>
    <!-- Enlace para redirigir a la lista de ventas -->
    <a href="<?= ROOTURL ?>?accion=VerVentas" target="_blank">Ir a la lista de ventas</a>
    <?php
} else {
    // Mostrar un mensaje de error en caso de falla
    echo "Error: " . mysqli_error($miConexion);
}
?>
