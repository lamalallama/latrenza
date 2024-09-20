<?php
include('conexionBD.php');

if (isset($_GET['txtBuscar'])) {
    $buscar = $_GET['txtBuscar'];
    $query = "SELECT IDProducto, Foto, Nombre, Precio, Stock, Destacado, Clasificacion FROM productos WHERE IDProducto LIKE '%$buscar%' OR Nombre LIKE '%$buscar%' OR Precio LIKE '%$buscar%' OR Stock LIKE '%$buscar%' OR Destacado LIKE '%$buscar%' OR Clasificacion LIKE '%$buscar%'";
} else {
    $query = "SELECT IDProducto, Foto, Nombre, Precio, Stock, Destacado, Clasificacion FROM productos";
}

$resultadoQuery = mysqli_query($miConexion, $query);
?>

<html>

<head>
    <link rel="stylesheet" href="EstiloCSS/tabla.css">
    <script src="CodigoJS/buscador.js"></script>
</head>

<body><br>
        <h1>Lista Productos</h1>
        <div class="table_body">
            <table id="tabla" border="2">
                <tr>
                    <th>IDProducto</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Destacado</th>
                    <th>Clasificacion</th>
                    <th colspan="2">Acciones/Funcionalidades</th>
                </tr>

                <?php
                while ($renglon = mysqli_fetch_assoc($resultadoQuery)) {   ?>
                    
                        <tr>
                            <td><?= $renglon['IDProducto'] ?></td>
                            <td><img src="data:image/jpg;base64,<?= base64_encode($renglon['Foto']) ?>" alt="Foto del Producto" width="50" height="50"></td>
                            <td><?= $renglon['Nombre'] ?></td>
                            <td><?= $renglon['Precio'] ?></td>
                            <td><?= $renglon['Stock'] ?></td>
                            <td><?= $renglon['Destacado'] ?></td>
                            <td><?= $renglon['Clasificacion'] ?></td>
                            <td>
                                <a href='Productos/EliminarProducto.php?no=<?= $renglon['IDProducto'] ?>'>
                                    <button type='button' class='btn btn-primary btn'>Eliminar</button></a>
                            </td>
                            <td>
                                <a href='Productos/FormModificarProducto.php?IDProducto=<?= $renglon['IDProducto'] ?>'>
                                    <button type='button' class='btn btn-primary btn'>Modificar</button></a>
                            </td>
                        </tr>
                    
                <?php }   ?>
            </table>
        </div>
</body>

</html>
