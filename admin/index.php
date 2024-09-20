<?php
//Este es el index.php
include('Configuracion.php');

$accion = isset($_GET['accion'])?$_GET['accion']:null;
// GET es una variable que lee datos desde los links
//isset es como un if, una condicion donde nos dice
//si existe accuin ?(entonces asigna o lee el valor de accion) :(sino asigna el valor de nulo/vacio)

//con este if verifico si el usuario inicio sesion con la super variable $_SESSION

//if(isset($_SESSION['admin_sesion']))
//{

include (HEADERADMIN); // sin apostrofe

switch($accion)
{
    // Apartado Ventas
    case 'VerVentas':
        include('Ventas/VerListaVentas.php');
    break;

    case 'AgregarVenta':
        include('Ventas\FormAgregarVenta.php');
    break;
    // Fin del Apartado

    // Apartado Usuarios
    case 'VerUsuarios':
        include('Usuarios\VerListaUsuarios.php');
    break;

    case 'AgregarUsuario':
        include('Usuarios\FormAgregarUsuario.php');
    break;
    // Fin del Apartado

    // Apartado Productos
    case 'VerProductos':
        include('Productos/VerListaProductos.php');
    break;

    case 'AgregarProducto':
        include('Productos\FormAgregarProducto.php');
    break;
    // Fin del Apartado

        // Apartado Empleados
    case 'VerEmpleados':
        include('Empleados/VerListaEmpleados.php');
    break;

    case 'AgregarEmpleado':
        include('Empleados\FormAgregarEmpleado.php');
    break;
    // Fin del Apartado

    // Apartado Pedidos
    case 'VerPedidos':
        include('Pedidos/VerListaPedidos.php');
    break;

    case 'AgregarPedido':
        include('Pedidos\FormAgregarPedido.php');
    break;
    // Fin del Apartado


    default:
        include('home.php');
    break;
}
include(FOOTERADMIN);
//}

//else
//{
	//include('Login/formularioLogin.php');
//}

?>