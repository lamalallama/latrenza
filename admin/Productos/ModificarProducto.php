<?php
// Incluir el archivo de conexión a la base de datos
include('C:\xampp\htdocs\LaTrenza_4DV\admin\Configuracion.php');
include('C:/xampp/htdocs/LaTrenza_4DV/admin/conexionBD.php');

//Recuperar algunos datos
$id = $_POST['IDProducto'];
$query = "SELECT * FROM productos WHERE IDProducto = '$id'";
$resultadoQuery = mysqli_query($miConexion, $query);
$dato = mysqli_fetch_assoc($resultadoQuery);

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si 'IDProducto' está presente en $_POST
    if(isset($_POST['IDProducto'])) {
        // Obtener los datos del formulario
        $IDProducto = $_POST['IDProducto'];
        $Nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
        $Precio = isset($_POST['txtPrecio']) ? $_POST['txtPrecio'] : '';
        $Stock = isset($_POST['txtStock']) ? $_POST['txtStock'] : '';
        $Destacado = isset($_POST['txtDestacado']) ? $_POST['txtDestacado'] : '';
        $Clasificacion = isset($_POST['txtClasificacion']) ? $_POST['txtClasificacion'] : '';

        // Verificar si se ha cargado un nuevo archivo de imagen
        if(isset($_FILES['nuevaFoto']) && $_FILES['nuevaFoto']['error'] === UPLOAD_ERR_OK) {
            $rutaDestino = 'C:/xampp/htdocs/LaTrenza_4DV/admin/Imagenes/Productos'; // Establece la ruta de destino para guardar la nueva imagen
            
            // Generar un nombre único para el archivo de imagen
            $nombreArchivo = uniqid('imagen_') . '.' . pathinfo($_FILES['nuevaFoto']['name'], PATHINFO_EXTENSION);

            // Mover el archivo de imagen cargado a la ruta de destino
            if(move_uploaded_file($_FILES['nuevaFoto']['tmp_name'], $rutaDestino . $nombreArchivo)) {
                // Asignar la ruta de la nueva imagen al campo 'Foto'
                $Foto = $rutaDestino . $nombreArchivo;
            } else {
                echo "Error al mover el archivo de imagen.";
                exit();
            }
        } else {
            // Si no se ha cargado una nueva foto, mantén la foto actual en la base de datos sin realizar cambios en el campo de la foto
            $Foto = $dato['Foto']; // Aquí asumes que el nombre del campo en la base de datos es 'Foto'
        }

        // Sentencia SQL para actualizar los datos
        $query = "UPDATE productos SET Foto = '$Foto', Nombre = '$Nombre', Precio = '$Precio', Stock = '$Stock', Destacado = '$Destacado', Clasificacion = '$Clasificacion' WHERE IDProducto = '$IDProducto'";

        // Ejecutar la sentencia SQL
        if (mysqli_query($miConexion, $query)) 
        {
            echo "¡La modificación fue exitosa!";
            ?>
             <a href="<?= ROOTURL ?>?accion=VerProductos" target="_blank">Ir a la lista de productos</a>
            <?php
        } else {
            echo "Error al modificar los datos: " . mysqli_error($miConexion);
        }
    } else {
        echo "Error: No se recibió el valor de 'IDProducto'.";
    }
}
?>
