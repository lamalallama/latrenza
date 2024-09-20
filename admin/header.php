<?php
//Este archivo se llama header.php

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sesion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
  </head>
  <body>
      <ul class="menu-horizontal">
        <li><a href="<?=ROOTURL?>">INICIO</a></li>
         
          <ul class="menu-vertical">
		  
              <p class="p0">VENTAS <i class="fas fa-cart-shopping"></i></p>
              <li></i> <a href="<?= ROOTURL?>?accion=VerVentas">Ver Lista de Ventas</a></li>
              <li></i> <a href="<?= ROOTURL?>?accion=AgregarVenta">Agregar Ventas</a></li>

              <p class="p0">PRODUCTOS <i class="fas fa-box"></i></p>
              <li> <a href="<?= ROOTURL?>?accion=VerProductos">Ver Lista de Productos</a></li>
              <li> <a href="<?= ROOTURL?>?accion=AgregarProducto">Agregar Productos</a></li>
			  
              <p class="p0">USUARIOS <i class="fas fa-user"></i></p>
              <li> <a href="<?= ROOTURL?>?accion=VerUsuarios">Ver Lista de Usuarios</a></li>
              <li> <a href="<?= ROOTURL?>?accion=AgregarUsuario">Agregar Usuario</a></li>

              <p class="p0">EMPLEADOS <i class="fas fa-user-tie"></i></p>
              <li> <a href="<?= ROOTURL?>?accion=VerEmpleados">Ver Lista de Empleados</a></li>
              <li> <a href="<?= ROOTURL?>?accion=AgregarEmpleado">Agregar Empleado</a></li>

              <p class="p0">PEDIDOS <i class="fas fa-tag"></i></p>
              <li> <a href="<?= ROOTURL?>?accion=VerPedidos">Ver Lista de Pedidos</a></li>
              <li> <a href="<?= ROOTURL?>?accion=AgregarPedido">Agregar Pedido</a></li>

          </ul>
        </li>
      </ul>
      
	  <br/>
	  
  </body>
</html>











