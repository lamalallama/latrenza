<?php
include('conexionBD.php');

// Verificar si hay un término de búsqueda proporcionado
if (isset($_GET['txtBuscar'])) {
    $buscar = $_GET['txtBuscar'];
    // Adaptar la consulta SQL para la tabla de empleados
    $query = "SELECT IDEmpleado, Foto, Nombre, Correo, Puesto, FechaContratacion, Salario
              FROM empleados 
              WHERE IDEmpleado LIKE '%$buscar%' OR 
                    Nombre LIKE '%$buscar%' OR 
                    Correo LIKE '%$buscar%' OR 
                    Puesto LIKE '%$buscar%' OR 
                    FechaContratacion LIKE '%$buscar%' OR 
                    Salario LIKE '%$buscar%'";
} else {
    // Consulta SQL por defecto si no hay búsqueda
    $query = "SELECT IDEmpleado, Foto, Nombre, Correo, Puesto, FechaContratacion, Salario FROM empleados";
}

// Ejecutar la consulta SQL
$resultadoQuery = mysqli_query($miConexion, $query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados</title>
    <link rel="stylesheet" href="EstiloCSS/tabla.css">
    <script src="CodigoJS/buscador.js"></script>
</head>

<body><br>
    <h1>Lista de Empleados</h1>
    <div class="table_body">
        <table id="tabla" border="2">
            <tr>
                <th>Foto</th>
                <th>IDEmpleado</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Puesto</th>
                <th>Fecha Contratación</th>
                <th>Salario</th>
                <th colspan="2">Acciones/Funcionalidades</th>
            </tr>

            <?php
            // Recorrer y mostrar los resultados de la consulta
            while ($renglon = mysqli_fetch_assoc($resultadoQuery)) { ?>
                <tr>
                    <td><img src="<?= $renglon['Foto'] ?>" alt="Foto de empleado"></td>
                    <td><?= $renglon['IDEmpleado'] ?></td>
                    <td><?= $renglon['Nombre'] ?></td>
                    <td><?= $renglon['Correo'] ?></td>
                    <td><?= $renglon['Puesto'] ?></td>
                    <td><?= $renglon['FechaContratacion'] ?></td>
                    <td><?= $renglon['Salario'] ?></td>
                    <td>
                        <a href='Empleados/EliminarEmpleado.php?no=<?= $renglon['IDEmpleado'] ?>'>
                            <button type='button' class='btn btn-primary btn'>Eliminar</button></a>
                    </td>
                    <td>
                        <a href='Empleados/FormModificarEmpleado.php?IDEmpleado=<?= $renglon['IDEmpleado'] ?>'>
                            <button type='button' class='btn btn-primary btn'>Modificar</button></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
