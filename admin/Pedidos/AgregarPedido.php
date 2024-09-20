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
$IDUsuario = $_POST['txtIDUsuario'];
$FechaPedido = $_POST['txtFechaPedido'];

// Consulta SQL para insertar el pedido en la base de datos
$query = "INSERT INTO `pedidos` (IDUsuario, FechaPedido) VALUES ('$IDUsuario', '$FechaPedido')";

// Verificar si se registró la información correctamente
if ($resultado = mysqli_query($miConexion, $query)) {
    ?>
    <h3>Pedido Registrado Exitosamente</h3>
    <a href="<?= ROOTURL ?>?accion=VerPedidos" target="_blank">Ir a la lista de pedidos</a>
    <?php
} else {
    echo "<h3>Hubo un error: " . mysqli_error($miConexion) . "</h3>";
}
?>