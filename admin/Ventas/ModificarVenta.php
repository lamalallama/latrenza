<?php
// Incluir los archivos de configuración y conexión a la base de datos
include('C:/xampp/htdocs/LaTrenza_4DV/admin/Configuracion.php');
include('C:/xampp/htdocs/LaTrenza_4DV/admin/conexionBD.php');

// Recuperar el ID de la venta desde el formulario (usando el método POST)
$id = $_POST['IDVenta'];
$query = "SELECT * FROM ventas WHERE IDVenta = '$id'";
$resultadoQuery = mysqli_query($miConexion, $query);
$dato = mysqli_fetch_assoc($resultadoQuery);

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si 'IDVenta' está presente en $_POST
    if(isset($_POST['IDVenta'])) {
        // Obtener los datos del formulario
        $IDVenta = $_POST['IDVenta'];
        $IDProducto = isset($_POST['IDProducto']) ? $_POST['IDProducto'] : '';
        $IDUsuario = isset($_POST['IDUsuario']) ? $_POST['IDUsuario'] : '';
        $IDEmpleado = isset($_POST['IDEmpleado']) ? $_POST['IDEmpleado'] : '';
        $Precio = isset($_POST['Precio']) ? $_POST['Precio'] : '';
        $Cantidad = isset($_POST['Cantidad']) ? $_POST['Cantidad'] : '';
        $Importe = isset($_POST['Importe']) ? $_POST['Importe'] : '';
        $FechaVenta = isset($_POST['FechaVenta']) ? $_POST['FechaVenta'] : '';
        $FechaCancelacion = isset($_POST['FechaCancelacion']) ? $_POST['FechaCancelacion'] : NULL;

        // Sentencia SQL para actualizar los datos de la venta
        $query = "UPDATE ventas SET 
                    IDProducto = '$IDProducto', 
                    IDUsuario = '$IDUsuario', 
                    IDEmpleado = '$IDEmpleado', 
                    Precio = '$Precio', 
                    Cantidad = '$Cantidad', 
                    Importe = '$Importe', 
                    FechaVenta = '$FechaVenta', 
                    FechaCancelacion = '$FechaCancelacion' 
                  WHERE IDVenta = '$IDVenta'";

        // Ejecutar la sentencia SQL
        if (mysqli_query($miConexion, $query)) {
            echo "¡La modificación fue exitosa!";
            ?>
             <a href="<?= ROOTURL ?>?accion=VerVentas" target="_blank">Ir a la lista de ventas</a>
            <?php
        } else {
            echo "Error al modificar los datos: " . mysqli_error($miConexion);
        }
    } else {
        echo "Error: No se recibió el valor de 'IDVenta'.";
    }
}
?>
