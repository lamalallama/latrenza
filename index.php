<?php
session_start(); // Inicia la sesión

$accion = isset($_GET['accion']) ? $_GET['accion'] : null;

include('configuracion.php');


if (isset($_SESSION['user_session'])) {
    include(HEADERCLIENTE);
    switch ($accion) {
        case 'ListaProductos':
            include('Productos/ListaProductos.php');
            // practicas es la capeta donde se encuentran mis practicas
            break;

        case 'SobreNosotros':
            include('SobreNosotros/SobreNosotros.php');
            break;

        case 'Nosotros':
            include('Nosotros/Nosotros.php');
            break;

        case 'Ubicacion':
            include('Ubicacion/Encuentranos.php');
            break;

        case 'Pedidos':
            include('Pedidos/Pedidos.php');
            break;
        
        case 'cerrarsesion':
            include('Login\procesoCerrarSesion.php');
            break;

        default:
            include('home.php');
            break;

        
    }
    include(FOOTERCLIENTE);
} else {
    header("Location: Login/FormularioLogin.php"); // Redirige al formulario de inicio de sesión si la sesión no está iniciada
    exit; // Termina el script para evitar ejecución adicional
}


?>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- core  -->
<script src="vendors/jquery/jquery-3.4.1.js"></script>
<script src="vendors/bootstrap/bootstrap.bundle.js"></script>

<!-- bootstrap affix -->
<script src="vendors/bootstrap/bootstrap.affix.js"></script>

<!-- wow.js -->
<script src="vendors/wow/wow.js"></script>

<!-- google maps -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

<!-- FoodHut js -->
<script src="assets/js/foodhut.js"></script>

</body>

</html>