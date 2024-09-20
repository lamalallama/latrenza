<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <title>Iniciar sesión y Registrarse</title>
</head>
<body>
    <div class="container">
        <div class="signin-signup">
            <form action="procesoIniciarSesion.php" class="sign-in-form" method="POST">
                <h2 class="title">Iniciar sesión</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre de usuario">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="txtContrasena" id="txtContrasena" placeholder="Contraseña">
                </div>
                <a href="#" class="forgot-password">¿Olvidó su contraseña?</a>
                <input type="submit" value="Iniciar sesión" class="btn">
                <p>¿No tiene una cuenta? <a href="#" class="account-text" id="sign-up-link">Regístrate</a></p>
            </form>
            <form action="procesoCrearCuenta.php" class="sign-up-form" method="POST">
                <h2 class="title">Registrarse</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre de usuario">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="txtCorreo" id="txtCorreo" placeholder="Correo electrónico">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="txtContrasena" id="txtContrasena" placeholder="Contraseña">
                </div>
                <input type="submit" value="Registrarse" class="btn">
                <p>¿Ya tiene una cuenta? <a href="#" class="account-text" id="sign-in-link">Iniciar sesión</a></p>
            </form>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>