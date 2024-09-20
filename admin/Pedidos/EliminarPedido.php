<?php
// Incluir el archivo de conexión a la base de datos
require('C:/xampp/htdocs/LaTrenza_4DV/conexionBD.php');

// Recuperar el ID del pedido a eliminar desde la URL
$id = $_GET['no'];

// Crear la sentencia SQL para eliminar el pedido
$sentencia = "DELETE FROM pedidos WHERE IDPedido = '".$id."' ";

// Ejecutar la sentencia SQL y verificar si fue exitosa
if(mysqli_query($miConexion, $sentencia)) {
    echo "<br/> Pedido Eliminado Exitosamente";
    ?>
    <!-- Enlace para redirigir a la lista de pedidos -->
    <a href="<?= ROOTURL ?>?accion=VerPedidos" target="_blank">Ir a la lista de pedidos</a>
    <?php
} else {
    // Mostrar un mensaje de error en caso de falla
    echo "Error: " . mysqli_error($miConexion);
}
?>
