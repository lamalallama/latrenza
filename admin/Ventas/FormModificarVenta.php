<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Datos de la Venta</title>
    <link rel="stylesheet" href="http://localhost/LaTrenza_4DV/EstiloCSS/formulariom.css">
</head>
<body>

<?php
// Conexión a la base de datos
$miConexion = new mysqli("localhost", "root", "", "latrenza");
if ($miConexion->connect_error) {
    die("Error de conexión: " . $miConexion->connect_error);
}

// Recuperar el ID de la venta a editar desde la URL
$IDVenta = $_GET['IDVenta'];

// Obtener los datos actuales de la venta
$sql = "SELECT * FROM ventas WHERE IDVenta = $IDVenta";
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
    <h4>Editar Datos de la Venta</h4>
    <form action="ModificarVenta.php" method="post">
        <input type="hidden" name="IDVenta" value="<?php echo $IDVenta; ?>"> <!-- Campo oculto para enviar el valor de IDVenta -->

        <!-- Campos para editar la venta -->
        ID Producto: 
        <input class="controls" type="number" name="IDProducto" id="IDProducto" value="<?php echo $registro['IDProducto']; ?>"><br>

        ID Usuario: 
        <input class="controls" type="number" name="IDUsuario" id="IDUsuario" value="<?php echo $registro['IDUsuario']; ?>"><br>

        ID Empleado: 
        <input class="controls" type="number" name="IDEmpleado" id="IDEmpleado" value="<?php echo $registro['IDEmpleado']; ?>"><br>

        Precio: 
        <input class="controls" type="text" name="Precio" id="Precio" value="<?php echo $registro['Precio']; ?>"><br>

        Cantidad: 
        <input class="controls" type="number" name="Cantidad" id="Cantidad" value="<?php echo $registro['Cantidad']; ?>"><br>

        Importe: 
        <input class="controls" type="text" name="Importe" id="Importe" value="<?php echo $registro['Importe']; ?>"><br>

        Fecha de Venta: 
        <input class="controls" type="date" name="FechaVenta" id="FechaVenta" value="<?php echo $registro['FechaVenta']; ?>"><br>

        Fecha de Cancelación (opcional): 
        <input class="controls" type="date" name="FechaCancelacion" id="FechaCancelacion" value="<?php echo $registro['FechaCancelacion']; ?>"><br>

        <input class="botons" type="submit" value="Actualizar">
    </form>
</section>
</body>
</html>
