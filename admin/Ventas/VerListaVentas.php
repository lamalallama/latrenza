<?php
include('conexionBD.php');

// Verificar si hay un término de búsqueda proporcionado
if (isset($_GET['txtBuscar'])) {
    $buscar = $_GET['txtBuscar'];
    // Adaptar la consulta SQL para la tabla de ventas
    $query = "SELECT IDVenta, IDProducto, IDUsuario, IDEmpleado, Precio, Cantidad, Importe, FechaVenta, FechaCancelacion 
              FROM ventas 
              WHERE IDVenta LIKE '%$buscar%' OR 
                    IDProducto LIKE '%$buscar%' OR 
                    IDUsuario LIKE '%$buscar%' OR 
                    IDEmpleado LIKE '%$buscar%' OR 
                    Precio LIKE '%$buscar%' OR 
                    Cantidad LIKE '%$buscar%' OR 
                    Importe LIKE '%$buscar%' OR 
                    FechaVenta LIKE '%$buscar%' OR 
                    FechaCancelacion LIKE '%$buscar%'";
} else {
    // Consulta SQL por defecto si no hay búsqueda
    $query = "SELECT IDVenta, IDProducto, IDUsuario, IDEmpleado, Precio, Cantidad, Importe, FechaVenta, FechaCancelacion FROM ventas";
}

// Ejecutar la consulta SQL
$resultadoQuery = mysqli_query($miConexion, $query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Ventas</title>
    <link rel="stylesheet" href="EstiloCSS/tabla.css">
    <script src="CodigoJS/buscador.js"></script>
</head>

<body><br>
    <h1>Lista de Ventas</h1>
    <div class="table_body">
        <table id="tabla" border="2">
            <tr>
                <th>IDVenta</th>
                <th>IDProducto</th>
                <th>IDUsuario</th>
                <th>IDEmpleado</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Importe</th>
                <th>FechaVenta</th>
                <th>FechaCancelacion</th>
                <th colspan="2">Acciones/Funcionalidades</th>
            </tr>

            <?php
            // Recorrer y mostrar los resultados de la consulta
            while ($renglon = mysqli_fetch_assoc($resultadoQuery)) { ?>
                <tr>
                    <td><?= $renglon['IDVenta'] ?></td>
                    <td><?= $renglon['IDProducto'] ?></td>
                    <td><?= $renglon['IDUsuario'] ?></td>
                    <td><?= $renglon['IDEmpleado'] ?></td>
                    <td><?= $renglon['Precio'] ?></td>
                    <td><?= $renglon['Cantidad'] ?></td>
                    <td><?= $renglon['Importe'] ?></td>
                    <td><?= $renglon['FechaVenta'] ?></td>
                    <td><?= $renglon['FechaCancelacion'] ?></td>
                    <td>
                        <a href='Ventas/EliminarVenta.php?no=<?= $renglon['IDVenta'] ?>'>
                            <button type='button' class='btn btn-primary btn'>Eliminar</button></a>
                    </td>
                    <td>
                        <a href='Ventas/FormModificarVenta.php?IDVenta=<?= $renglon['IDVenta'] ?>'>
                            <button type='button' class='btn btn-primary btn'>Modificar</button></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
