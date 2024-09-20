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
$Foto = $_POST['txtFoto'];
$Nombre = $_POST['txtNombre'];
$Correo = $_POST['txtCorreo'];
$Puesto = $_POST['txtPuesto'];
$FechaContratacion = $_POST['txtFechaContratacion'];
$Salario = $_POST['txtSalario'];

// Consulta SQL para insertar el empleado en la base de datos
$query = "INSERT INTO `empleados` (Foto, Nombre, Correo, Puesto, FechaContratacion, Salario) 
          VALUES ('$Foto', '$Nombre', '$Correo', '$Puesto', '$FechaContratacion', '$Salario')";

// Verificar si se registró la información correctamente
if ($resultado = mysqli_query($miConexion, $query)) {
    ?>
    <h3>Empleado Registrado Exitosamente</h3>
    <a href="<?= ROOTURL ?>?accion=VerEmpleados" target="_blank">Ir a la lista de empleados</a>
    <?php
} else {
    echo "<h3>Hubo un error: " . mysqli_error($miConexion) . "</h3>";
}
?>
