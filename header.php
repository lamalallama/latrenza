<?php
//archivo: header.php
//interfaz de usuario cliente
include('conexionBD.php');  
$id = $_SESSION['user_session']['IDUsuario'];
 $query = "SELECT * FROM usuarios WHERE IDUsuario = '$id'";
 $resultadoQuery = mysqli_query($miConexion, $query);
 $dato = mysqli_fetch_assoc($resultadoQuery);
 $foto = '0.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with FoodHut landing page.">
    <meta name="author" content="Devcrud">
    <title>「 ✦ ʟ ᴀ ᴛ ʀ ᴇ ɴ ᴢ ᴀ ✦ 」</title>
   
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/foodhut.css">

    <!-- Bootstrap + FoodHut main styles -->
    <link rel="stylesheet" href="css/foodhut.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=ROOTURL?>">inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOTURL?>?accion=SobreNosotros">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOTURL?>?accion=ListaProductos">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOTURL?>?accion=Pedidos">Pedidos</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <span class="brand-txt">-ˏˋ⋆ 𝐋 𝐀 𝐓 𝐑 𝐄 𝐍 𝐙 𝐀 ⋆ˊˎ-</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOTURL?>?accion=Nosotros">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOTURL?>?accion=Ubicacion">Ubicados</a>
                </li>
                <li class="nav-item">
                    <a href="#"><div class="fas fa-user btn btn-primary ml-xl-4" id="user-btn"> ᴜ ꙅ ᴜ ᴀ ʀ ɪ ᴏ</div></a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Submenu -->
    <div class="sub-menu-wrap" id="subMenu" style="display: none;">
        <div class="sub-menu">
            <div class="user-info">
            <img src="data:image/jpg;base64,<?= base64_encode($dato['Foto']) ?>" alt="Foto del Producto"> 
                <h3><?=$dato['Nombre']?></h3>
            </div>
            <a href="<?= ROOTURL ?>?accion=cerrarsesion" class="sub-menu-link">
                <img src="imagenes\Login\logout.png" alt="">
                <p>Logout</p>
            </a>
        </div>
    </div>   
    <script>
        document.getElementById('user-btn').addEventListener('click', function() {
            var subMenu = document.getElementById('subMenu');
            if (subMenu.style.display === 'none' || subMenu.style.display === '') {
                subMenu.style.display = 'block';
            } else {
                subMenu.style.display = 'none';
            }
        });
    </script>
</body>
</html>
