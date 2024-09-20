<?php
//enviados en el formularioEmpleado.php
include("../configuracion.php");
//Aqui verifico como se reciben los datos

//print_r($_POST);
//Se agrega la conexion a la base de datos
//el ../ quiere decir salir de la carpeta actual
$miConexion = new mysqli("localhost" , "root" , "" , "latrenza");

if($miConexion->connect_error){
    die("La conexion fallo");
}
print "<br>";

//Declarar variable para obtener los datos enviados
//La variable POST es un arreglo

$Nombre = $_POST['opciones'];

$query2 = "SELECT * FROM productos WHERE Nombre='$Nombre'";
$resultadoQuery = mysqli_query($miConexion, $query2);
$dato = mysqli_fetch_assoc($resultadoQuery);

$IDProducto = $dato['IDProducto'];

$IDUsuario = $_POST['IDUsuario'];


$query="INSERT INTO `pedidos`(`IDUsuario`, `IDProducto` ) VALUES('$IDUsuario', $IDProducto)";

//Se verifica si se registo la informacion
if($resultado = mysqli_query($miConexion, $query)){
    ?>
    <h1>Pedido Agregado Exitosamente</h1>
    <a href="<?=ROOTURL?>?accion=ListaProductos">Regresar a la lista de Pedidos</a>
    <?php
}
else{
    ?>
    <h3>"Hubo un error"</h3>
<?php }
?>