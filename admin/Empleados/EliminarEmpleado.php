<?php
// Incluir el archivo de conexión a la base de datos
require('C:/xampp/htdocs/LaTrenza_4DV/conexionBD.php');

// Recuperar el ID del empleado a eliminar desde la URL
$id = $_GET['no'];

// Crear la sentencia SQL para eliminar el empleado
$sentencia = "DELETE FROM empleados WHERE IDEmpleado = '".$id."' ";

// Ejecutar la sentencia SQL y verificar si fue exitosa
if(mysqli_query($miConexion, $sentencia)) {
    echo "<br/> Empleado Eliminado Exitosamente";
    ?>
    <!-- Enlace para redirigir a la lista de empleados -->
    <a href="<?= ROOTURL ?>?accion=VerEmpleados" target="_blank">Ir a la lista de empleados</a>
    <?php
} else {
    // Mostrar un mensaje de error en caso de falla
    echo "Error: " . mysqli_error($miConexion);
}
?>
