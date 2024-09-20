<?php
// Incluir los archivos de configuración y conexión a la base de datos
include('C:/xampp/htdocs/LaTrenza_4DV/admin/Configuracion.php');
include('C:/xampp/htdocs/LaTrenza_4DV/admin/conexionBD.php');

// Recuperar el ID del usuario desde el formulario (usando el método POST)
$id = $_POST['IDUsuario'];
$query = "SELECT * FROM usuarios WHERE IDUsuario = '$id'";
$resultadoQuery = mysqli_query($miConexion, $query);
$dato = mysqli_fetch_assoc($resultadoQuery);

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si 'IDUsuario' está presente en $_POST
    if(isset($_POST['IDUsuario'])) {
        // Obtener los datos del formulario
        $IDUsuario = $_POST['IDUsuario'];
        $Nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
        $Correo = isset($_POST['txtCorreo']) ? $_POST['txtCorreo'] : '';
        $Contrasena = isset($_POST['txtContrasena']) ? $_POST['txtContrasena'] : '';

        // Verificar si se ha cargado un nuevo archivo de imagen para la foto del usuario
        if(isset($_FILES['nuevaFoto']) && $_FILES['nuevaFoto']['error'] === UPLOAD_ERR_OK) {
            $rutaDestino = 'C:/xampp/htdocs/LaTrenza_4DV/admin/Imagenes/Usuarios/'; // Establece la ruta de destino para guardar la nueva imagen
            
            // Generar un nombre único para el archivo de imagen
            $nombreArchivo = uniqid('usuario_') . '.' . pathinfo($_FILES['nuevaFoto']['name'], PATHINFO_EXTENSION);

            // Mover el archivo de imagen cargado a la ruta de destino
            if(move_uploaded_file($_FILES['nuevaFoto']['tmp_name'], $rutaDestino . $nombreArchivo)) {
                // Asignar la ruta de la nueva imagen al campo 'Foto'
                $Foto = $rutaDestino . $nombreArchivo;
            } else {
                echo "Error al mover el archivo de imagen.";
                exit();
            }
        } else {
            // Si no se ha cargado una nueva foto, mantener la foto actual en la base de datos sin realizar cambios en el campo de la foto
            $Foto = $dato['Foto']; // Asume que el nombre del campo en la base de datos es 'Foto'
        }

        // Sentencia SQL para actualizar los datos del usuario
        $query = "UPDATE usuarios SET Foto = '$Foto', Nombre = '$Nombre', Correo = '$Correo', Contrasena = '$Contrasena' WHERE IDUsuario = '$IDUsuario'";

        // Ejecutar la sentencia SQL
        if (mysqli_query($miConexion, $query)) {
            echo "¡La modificación fue exitosa!";
            ?>
             <a href="<?= ROOTURL ?>?accion=VerUsuarios" target="_blank">Ir a la lista de usuarios</a>
            <?php
        } else {
            echo "Error al modificar los datos: " . mysqli_error($miConexion);
        }
    } else {
        echo "Error: No se recibió el valor de 'IDUsuario'.";
    }
}
?>
