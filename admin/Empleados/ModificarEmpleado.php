<?php
// Incluir los archivos de configuración y conexión a la base de datos
include('C:/xampp/htdocs/LaTrenza_4DV/admin/Configuracion.php');
include('C:/xampp/htdocs/LaTrenza_4DV/admin/conexionBD.php');

// Recuperar el ID del empleado desde el formulario (usando el método POST)
$id = $_POST['IDEmpleado'];
$query = "SELECT * FROM empleados WHERE IDEmpleado = '$id'";
$resultadoQuery = mysqli_query($miConexion, $query);
$dato = mysqli_fetch_assoc($resultadoQuery);

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si 'IDEmpleado' está presente en $_POST
    if(isset($_POST['IDEmpleado'])) {
        // Obtener los datos del formulario
        $IDEmpleado = $_POST['IDEmpleado'];
        $Foto = isset($_POST['Foto']) ? $_POST['Foto'] : '';
        $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : '';
        $Correo = isset($_POST['Correo']) ? $_POST['Correo'] : '';
        $Puesto = isset($_POST['Puesto']) ? $_POST['Puesto'] : '';
        $FechaContratacion = isset($_POST['FechaContratacion']) ? $_POST['FechaContratacion'] : '';
        $Salario = isset($_POST['Salario']) ? $_POST['Salario'] : '';

        // Sentencia SQL para actualizar los datos del empleado
        $query = "UPDATE empleados SET 
                    Foto = '$Foto',
                    Nombre = '$Nombre',
                    Correo = '$Correo',
                    Puesto = '$Puesto',
                    FechaContratacion = '$FechaContratacion',
                    Salario = '$Salario'
                  WHERE IDEmpleado = '$IDEmpleado'";

        // Ejecutar la sentencia SQL
        if (mysqli_query($miConexion, $query)) {
            echo "¡La modificación fue exitosa!";
            ?>
             <a href="<?= ROOTURL ?>?accion=VerEmpleados" target="_blank">Ir a la lista de empleados</a>
            <?php
        } else {
            echo "Error al modificar los datos: " . mysqli_error($miConexion);
        }
    } else {
        echo "Error: No se recibió el valor de 'IDEmpleado'.";
    }
}
?>
