<?php
include('conexionBD.php');

// Verificar si hay un término de búsqueda proporcionado
if (isset($_GET['txtBuscar'])) {
    $buscar = $_GET['txtBuscar'];
    // Adaptar la consulta SQL para la tabla de usuarios
    $query = "SELECT IDUsuario, Foto, Nombre, Correo, Contrasena FROM usuarios WHERE IDUsuario LIKE '%$buscar%' OR Nombre LIKE '%$buscar%' OR Correo LIKE '%$buscar%'";
} else {
    // Consulta SQL por defecto si no hay búsqueda
    $query = "SELECT IDUsuario, Foto, Nombre, Correo, Contrasena FROM usuarios";
}

// Ejecutar la consulta SQL
$resultadoQuery = mysqli_query($miConexion, $query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="EstiloCSS/tabla.css">
    <script src="CodigoJS/buscador.js"></script>
</head>

<body><br>
    <h1>Lista de Usuarios</h1>
    <div class="table_body">
        <table id="tabla" border="2">
            <tr>
                <th>IDUsuario</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th colspan="2">Acciones/Funcionalidades</th>
            </tr>

            <?php
            // Recorrer y mostrar los resultados de la consulta
            while ($renglon = mysqli_fetch_assoc($resultadoQuery)) { ?>
                <tr>
                    <td><?= $renglon['IDUsuario'] ?></td>
                    <td><img src="data:image/jpg;base64,<?= base64_encode($renglon['Foto']) ?>" alt="Foto del Usuario" width="50" height="50"></td>
                    <td><?= $renglon['Nombre'] ?></td>
                    <td><?= $renglon['Correo'] ?></td>
                    <td><?= $renglon['Contrasena'] ?></td>
                    <td>
                        <a href='Usuarios/EliminarUsuario.php?no=<?= $renglon['IDUsuario'] ?>'>
                            <button type='button' class='btn btn-primary btn'>Eliminar</button></a>
                    </td>
                    <td>
                        <a href='Usuarios/FormModificarUsuario.php?IDUsuario=<?= $renglon['IDUsuario'] ?>'>
                            <button type='button' class='btn btn-primary btn'>Modificar</button></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
