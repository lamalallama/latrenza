<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="http://localhost/HARVESTDEAL/admin/EstiloCSS/formulario.css">
</head>

<body>
    <center>
    <section class="registro">
        <h4>Agregar Producto</h4>
        <form method="POST" name="formProductos" id="formProductos" action="Productos/AgregarProducto.php" enctype="multipart/form-data">

            Nombre Del Producto
            <input class="controls" type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese el nombre del producto">
            <br/>
            Foto del Producto
            <input class="controls" type="file" name="fileFoto" id="fileFoto">
            <br/>
            Precio Del Producto
            <input class="controls" type="number" name="txtPrecio" id="txtPrecio" placeholder="Ingrese el precio del producto">
            <br/>
            Stock Del Producto
            <input class="controls" type="number" name="txtStock" id="txtStock" placeholder="Ingrese la cantidad en stock del producto">
            <br/>
            Producto a Destacar?
            <input class="controls" type="text" name="txtDestacado" id="txtDestacado" placeholder="Ingrese si el producto está destacado (Sí/No)">
            <br/>
            Clasificacion del Producto
            <input class="controls" type="text" name="txtClasificacion" id="txtClasificacion" placeholder="Ingrese la clasificación del producto">
            <br/>
            <input class="botons" type="submit" name="btnRegistrarProductos" id="btnRegistrarProductos" value="Guardar Datos">
        </form>
    </section>
    </center>
</body>

</html>
