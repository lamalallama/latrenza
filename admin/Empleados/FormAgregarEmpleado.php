<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="http://localhost/HARVESTDEAL/admin/EstiloCSS/formulario.css">
    <title>Agregar Empleado</title>
</head>

<body>
    <center>
        <section class="registro">
            <h4>Agregar Empleado</h4>
            <form method="POST" name="formEmpleados" id="formEmpleados" action="Empleados/AgregarEmpleado.php" enctype="multipart/form-data">


                Foto
                <input class="controls" type="text" name="txtFoto" id="txtFoto" placeholder="Ingrese la URL de la foto" required>
                <br />

                Nombre
                <input class="controls" type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese el nombre" required>
                <br />

                Correo
                <input class="controls" type="email" name="txtCorreo" id="txtCorreo" placeholder="Ingrese el correo" required>
                <br />

                Puesto
                <input class="controls" type="text" name="txtPuesto" id="txtPuesto" placeholder="Ingrese el puesto" required>
                <br />

                Fecha de Contratación
                <input class="controls" type="date" name="txtFechaContratacion" id="txtFechaContratacion" required>
                <br />

                Salario
                <input class="controls" type="number" name="txtSalario" id="txtSalario" placeholder="Ingrese el salario" required>
                <br />

                <input class="botons" type="submit" name="btnRegistrarEmpleado" id="btnRegistrarEmpleado" value="Guardar Datos">
            </form>
        </section>
    </center>
</body>

</html>
