<?php
require('C:/xampp/htdocs/LaTrenza_4DV/conexionBD.php');
$id = $_GET['no'];
$sentencia = "DELETE FROM productos WHERE IDProducto = '".$id."' ";

if(mysqli_query($miConexion,$sentencia))
{
    echo "<br/> Registro Eliminado Exitosamente";
    ?>

    <a href="<?= ROOTURL ?>?accion=VerProductos" target="_blank">Ir a la lista de productos</a>

    <?php
}
else
{
    echo"Error: ". mysqli_error($miConexion);
}
?>
