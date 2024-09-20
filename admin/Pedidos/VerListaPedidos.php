<?php
include('conexionBD.php');

// Verificar si hay un término de búsqueda proporcionado
if (isset($_GET['txtBuscar'])) {
    $buscar = $_GET['txtBuscar'];
    // Adaptar la consulta SQL para la tabla de pedidos
    $query = "SELECT IDPedido, IDUsuario, FechaPedido
              FROM pedidos 
              WHERE IDPedido LIKE '%$buscar%' OR 
                    IDUsuario LIKE '%$buscar%' OR 
                    FechaPedido LIKE '%$buscar%'";
} else {
    // Consulta SQL por defecto si no hay búsqueda
    $query = "SELECT IDPedido, IDUsuario, FechaPedido FROM pedidos";
}

// Ejecutar la consulta SQL
$resultadoQuery = mysqli_query($miConexion, $query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Pedidos</title>
    <link rel="stylesheet" href="EstiloCSS/tabla.css">
    <script src="CodigoJS/buscador.js"></script>
</head>

<body><br>
    <h1>Lista de Pedidos</h1>
    <div class="table_body">
        <table id="tabla" border="2">
            <tr>
                <th>IDPedido</th>
                <th>IDUsuario</th>
                <th>FechaPedido</th>
                <th colspan="2">Acciones/Funcionalidades</th>
            </tr>

            <?php
            // Recorrer y mostrar los resultados de la consulta
            while ($renglon = mysqli_fetch_assoc($resultadoQuery)) { ?>
                <tr>
                    <td><?= $renglon['IDPedido'] ?></td>
                    <td><?= $renglon['IDUsuario'] ?></td>
                    <td><?= $renglon['FechaPedido'] ?></td>
                    <td>
                        <a href='Pedidos/EliminarPedido.php?no=<?= $renglon['IDPedido'] ?>'>
                            <button type='button' class='btn btn-primary btn'>Eliminar</button></a>
                    </td>
                    <td>
                        <a href='Pedidos/FormModificarPedido.php?IDPedido=<?= $renglon['IDPedido'] ?>'>
                            <button type='button' class='btn btn-primary btn'>Modificar</button></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
