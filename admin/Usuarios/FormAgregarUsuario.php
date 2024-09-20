<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="http://localhost/HARVESTDEAL/admin/EstiloCSS/formulario.css">
    <title>Agregar Usuario</title>
</head>

<body>
    <center>
    <section class="registro">
        <h4>Agregar Usuario</h4>
        <form method="POST" name="formUsuarios" id="formUsuarios" action="Usuarios/AgregarUsuario.php" enctype="multipart/form-data">
            
            Nombre del Usuario
            <input class="controls" type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese el nombre del usuario" required>
            <br/>

            Correo Electrónico
            <input class="controls" type="email" name="txtCorreo" id="txtCorreo" placeholder="Ingrese el correo electrónico del usuario" required>
            <br/>

            Contraseña
            <input class="controls" type="password" name="txtContrasena" id="txtContrasena" placeholder="Ingrese la contraseña del usuario" required>
            <br/>

            Foto del Usuario
            <input class="controls" type="file" name="fileFoto" id="fileFoto" accept="image/*">
            <br/>

            <input class="botons" type="submit" name="btnRegistrarUsuarios" id="btnRegistrarUsuarios" value="Guardar Datos">
        </form>
    </section>
    </center>
</body>

</html>
