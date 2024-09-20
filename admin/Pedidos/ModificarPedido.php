<?php
// Incluir los archivos de configuración y conexión a la base de datos
include('C:/xampp/htdocs/LaTrenza_4DV/admin/Configuracion.php');
include('C:/xampp/htdocs/LaTrenza_4DV/admin/conexionBD.php');

// Recuperar el ID del pedido desde el formulario (usando el método POST)
$id = $_POST['IDPedido'];
$query = "SELECT * FROM pedidos WHERE IDPedido = '$id'";
$resultadoQuery = mysqli_query($miConexion, $query);
$dato = mysqli_fetch_assoc($resultadoQuery);

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si 'IDPedido' está presente en $_POST
    if(isset($_POST['IDPedido'])) {
        // Obtener los datos del formulario
        $IDPedido = $_POST['IDPedido'];
        $IDUsuario = isset($_POST['IDUsuario']) ? $_POST['IDUsuario'] : '';
        $FechaPedido = isset($_POST['FechaPedido']) ? $_POST['FechaPedido'] : '';

        // Sentencia SQL para actualizar los datos del pedido
        $query = "UPDATE pedidos SET 
                    IDUsuario = '$IDUsuario', 
                    FechaPedido = '$FechaPedido' 
                  WHERE IDPedido = '$IDPedido'";

        // Ejecutar la sentencia SQL
        if (mysqli_query($miConexion, $query)) {
            echo "¡La modificación fue exitosa!";
            ?>
             <a href="<?= ROOTURL ?>?accion=VerPedidos" target="_blank">Ir a la lista de pedidos</a>
            <?php
        } else {
            echo "Error al modificar los datos: " . mysqli_error($miConexion);
        }
    } else {
        echo "Error: No se recibió el valor de 'IDPedido'.";
    }
}
?>
