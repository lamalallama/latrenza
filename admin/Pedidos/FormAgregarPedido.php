<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="http://localhost/HARVESTDEAL/admin/EstiloCSS/formulario.css">
    <title>Agregar Pedido</title>
</head>

<body>
    <center>
        <section class="registro">
            <h4>Agregar Pedido</h4>
            <form method="POST" name="formPedidos" id="formPedidos" action="Pedidos/AgregarPedido.php" enctype="multipart/form-data">


                ID de Usuario
                <input class="controls" type="text" name="txtIDUsuario" id="txtIDUsuario" placeholder="Ingrese el ID de usuario" required>
                <br />

                Fecha de Pedido
                <input class="controls" type="date" name="txtFechaPedido" id="txtFechaPedido" required>
                <br />

                <input class="botons" type="submit" name="btnRegistrarPedido" id="btnRegistrarPedido" value="Guardar Datos">
            </form>
        </section>
    </center>
</body>

</html>
