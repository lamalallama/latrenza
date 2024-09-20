<html>
<head>
    <title>Editar Datos</title>
    <link rel="stylesheet" href="http://localhost/LaTrenza_4DV/EstiloCSS/formulariom.css">
</head>
<body>

<?php
// Conexión a la base de datos (suponiendo que ya tienes la conexión establecida)
// Reemplaza 'localhost', 'usuario', 'contraseña', 'basededatos' con los valores adecuados
$miConexion = new mysqli("localhost", "root", "", "latrenza");
if ($miConexion->connect_error) {
    die("Error de conexión: " . $miConexion->connect_error);
}

// Recuperar el ID del registro a editar desde la URL
$IDProducto = $_GET['IDProducto'];

// Obtener los datos actuales del registro
$sql = "SELECT * FROM productos WHERE IDProducto = $IDProducto";
$resultado = $miConexion->query($sql);

if ($resultado->num_rows > 0) {
    $registro = $resultado->fetch_assoc();

    // Convertir los datos binarios de la imagen en una representación visual
    $imagenBase64 = base64_encode($registro['Foto']);
} else {
    echo "No se encontraron registros con el ID proporcionado";
    exit(); // Termina la ejecución del script si no se encuentra ningún registro
}

// Cerrar la conexión
$miConexion->close();
?>

<section class="registro">
    <h4>Editar Registro</h4>
<form action="ModificarProducto.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IDProducto" value="<?php echo $IDProducto; ?>"> <!-- Campo oculto para enviar el valor de IDProducto -->
    
    <!-- Mostrar la imagen actual -->
    Foto actual: <br>
    <img src="data:image/jpeg;base64,<?php echo $imagenBase64; ?>" alt="Foto actual del Producto" width="100" height="100"><br>
    
    <!-- Permitir al usuario seleccionar una nueva foto -->
    Nueva Foto: <input class="controls" type="file" name="nuevaFoto" id="nuevaFoto"><br>
    
    Nombre: <input class="controls" type="text" name="txtNombre" id="txtNombre" value="<?php echo $registro['Nombre']; ?>"><br>
    
    Precio: <input class="controls" type="text" name="txtPrecio" id="txtPrecio" value="<?php echo $registro['Precio']; ?>"><br>

    Stock: <input class="controls" type="text" name="txtStock" id="txtStock" value="<?php echo $registro['Stock']; ?>"><br>

    Destacado: <input class="controls" type="text" name="txtDestacado" id="txtDestacado" value="<?php echo $registro['Destacado']; ?>"><br>

    Clasificación: <input class="controls" type="text" name="txtClasificacion" id="txtClasificacion" value="<?php echo $registro['Clasificacion']; ?>"><br>

    <input class="botons" type="submit" value="Actualizar">
</form>
</body>
</html>
