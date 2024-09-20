<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Datos del Empleado</title>
    <link rel="stylesheet" href="http://localhost/LaTrenza_4DV/EstiloCSS/formulariom.css">
</head>
<body>

<?php
// Conexión a la base de datos
$miConexion = new mysqli("localhost", "root", "", "latrenza");
if ($miConexion->connect_error) {
    die("Error de conexión: " . $miConexion->connect_error);
}

// Recuperar el ID del empleado a editar desde la URL
$IDEmpleado = $_GET['IDEmpleado'];

// Obtener los datos actuales del empleado
$sql = "SELECT * FROM empleados WHERE IDEmpleado = $IDEmpleado";
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
    <h4>Editar Datos del Empleado</h4>
    <form action="ModificarEmpleado.php" method="post">
        <input type="hidden" name="IDEmpleado" value="<?php echo $IDEmpleado; ?>"> <!-- Campo oculto para enviar el valor de IDEmpleado -->

        <!-- Campos para editar el empleado -->
        Foto: 
        <input class="controls" type="text" name="Foto" id="Foto" value="<?php echo $registro['Foto']; ?>"><br>

        Nombre: 
        <input class="controls" type="text" name="Nombre" id="Nombre" value="<?php echo $registro['Nombre']; ?>"><br>

        Correo: 
        <input class="controls" type="email" name="Correo" id="Correo" value="<?php echo $registro['Correo']; ?>"><br>

        Puesto: 
        <input class="controls" type="text" name="Puesto" id="Puesto" value="<?php echo $registro['Puesto']; ?>"><br>

        Fecha de Contratación: 
        <input class="controls" type="date" name="FechaContratacion" id="FechaContratacion" value="<?php echo $registro['FechaContratacion']; ?>"><br>

        Salario: 
        <input class="controls" type="number" name="Salario" id="Salario" value="<?php echo $registro['Salario']; ?>"><br>

        <input class="botons" type="submit" value="Actualizar">
    </form>
</section>
</body>
</html>
