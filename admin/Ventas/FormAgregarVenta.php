<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="http://localhost/HARVESTDEAL/admin/EstiloCSS/formulario.css">
    <title>Agregar Venta</title>
</head>

<body>
    <center>
        <section class="registro">
            <h4>Agregar Venta</h4>
            <form method="POST" name="formVentas" id="formVentas" action="Ventas/AgregarVenta.php" enctype="multipart/form-data">


                ID de Producto
                <input class="controls" type="text" name="txtIDProducto" id="txtIDProducto" placeholder="Ingrese el ID de producto" required>
                <br />

                ID de Usuario
                <input class="controls" type="text" name="txtIDUsuario" id="txtIDUsuario" placeholder="Ingrese el ID de usuario" required>
                <br />

                ID de Empleado
                <input class="controls" type="text" name="txtIDEmpleado" id="txtIDEmpleado" placeholder="Ingrese el ID de empleado" required>
                <br />

                Precio
                <input class="controls" type="number" name="txtPrecio" id="txtPrecio" placeholder="Ingrese el precio" required>
                <br />

                Cantidad
                <input class="controls" type="number" name="txtCantidad" id="txtCantidad" placeholder="Ingrese la cantidad" required>
                <br />

                Importe
                <input class="controls" type="number" name="txtImporte" id="txtImporte" placeholder="Ingrese el importe" required>
                <br />

                Fecha de Venta
                <input class="controls" type="date" name="txtFechaVenta" id="txtFechaVenta" required>
                <br />

                Fecha de Cancelación
                <input class="controls" type="date" name="txtFechaCancelacion" id="txtFechaCancelacion">
                <br />

                <input class="botons" type="submit" name="btnRegistrarVenta" id="btnRegistrarVenta" value="Guardar Datos">
            </form>
        </section>
    </center>
</body>

</html>
