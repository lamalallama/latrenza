<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Datos del Pedido</title>
    <link rel="stylesheet" href="http://localhost/LaTrenza_4DV/EstiloCSS/formulariom.css">
</head>
<body>

<?php
// Conexión a la base de datos
$miConexion = new mysqli("localhost", "root", "", "latrenza");
if ($miConexion->connect_error) {
    die("Error de conexión: " . $miConexion->connect_error);
}

// Recuperar el ID del pedido a editar desde la URL
$IDPedido = $_GET['IDPedido'];

// Obtener los datos actuales del pedido
$sql = "SELECT * FROM pedidos WHERE IDPedido = $IDPedido";
$resultado = $miConexion->query($sql);

if ($resultado->num_rows > 0) {
    $registro = $resultado->fetch_assoc();
} else {
    echo "No se encontraron registros con el ID proporcionado";
    exit(); // Termina la ejecución del script si no se encuentra ningún registro
}

// Cerrar la conexión
$miConexion->close();
?>

<section class="registro">
    <h4>Editar Datos del Pedido</h4>
    <form action="ModificarPedido.php" method="post">
        <input type="hidden" name="IDPedido" value="<?php echo $IDPedido; ?>"> <!-- Campo oculto para enviar el valor de IDPedido -->

        <!-- Campos para editar el pedido -->
        ID Usuario: 
        <input class="controls" type="number" name="IDUsuario" id="IDUsuario" value="<?php echo $registro['IDUsuario']; ?>"><br>

        Fecha de Pedido: 
        <input class="controls" type="date" name="FechaPedido" id="FechaPedido" value="<?php echo $registro['FechaPedido']; ?>"><br>

        <input class="botons" type="submit" value="Actualizar">
    </form>
</section>
</body>
</html>
