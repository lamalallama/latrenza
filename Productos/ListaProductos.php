<?php
include('conexionBD.php');
$query = "SELECT IDProducto, Foto, Nombre, Precio, Stock, Destacado, Clasificacion FROM productos";
$resultadoQuery = mysqli_query($miConexion, $query);
$resultadoQuery2 = mysqli_query($miConexion, $query);
$resultadoQuery3 = mysqli_query($miConexion, $query);
$resultadoQuery4 = mysqli_query($miConexion, $query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=".\css\see.css">
    <style>
        /* Estilos para el modal */
        .modal {
            display: none;
            /* Ocultar modal por defecto */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo semitransparente */
            overflow: auto;
        }

        .modal-content {
            color: black;
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            position: relative;
            font-family: Arial, sans-serif;
            /* Asegúrate de tener la misma fuente */
            border-radius: 5px;
            /* Añade bordes redondeados si es necesario */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Sombra ligera */
        }

        .product-container {
            display: flex;
        }

        .product-image {
            width: 40%;
            /* Ancho de la imagen */
            padding: 10px;
            /* Espaciado interno para separación */
        }

        .product-image img {
            max-width: 100%;
            height: auto;
        }

        .product-details {
            width: 60%;
            /* Ancho del contenido de detalles */
            padding: 10px;
            /* Espaciado interno para separación */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-details h1 {
            font-size: 24px;
            margin: 0 0 10px;
        }

        .product-details p {
            font-size: 14px;
            color: #757575;
            margin: 5px 0;
            line-height: 1.5;
        }

        .product-details button {
            background-color: #ffcc00;
            color: black;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        .product-details button:hover {
            background-color: #e6b800;
        }

        .close {
            color: #808080;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!--  gallary Section  -->
    <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
        <h2 class="section-title">✦•·······• 𝑀𝐸𝒩𝒰 •·······•✦</h2>
    </div>
    <div class="gallary row">
        <?php while ($renglon3 = mysqli_fetch_assoc($resultadoQuery3)) { ?>
            <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
                <img src="data:image/jpg;base64,<?= base64_encode($renglon3['Foto']) ?>" alt="" class="gallary-img">
                <a href="#" class="gallary-overlay" onclick="openModal('mainModal#<?= $renglon3['IDProducto'] ?>')">
                    <i class="gallary-icon ti-plus"></i>
                </a>
            </div>
            <!-- Modal -->
            <div id="mainModal#<?= $renglon3['IDProducto'] ?>" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('mainModal#<?= $renglon3['IDProducto'] ?>')">&times;</span>
                    <div class="product-container">
                        <div class="product-image">
                            <img src="data:image/jpg;base64,<?= base64_encode($renglon3['Foto']) ?>" alt="Product Image">
                        </div>
                        <div class="product-details">
                            <h1>$<?= $renglon3['Precio'] ?></h1>
                            <p><?= $renglon3['Nombre'] ?></p>
                            <p><?= $renglon3['Clasificacion'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- BLOG Section -->
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <h2 class="section-title py-5">✦•··• 𝒫𝒪𝒮𝒯𝑅𝐸𝒮 𝑀𝒜𝒮 𝒞𝒪𝑀𝒫𝑅𝒜𝒟𝒪𝒮 •··•✦</h2>
        <div class="row justify-content-center">
            <div class="col-sm-7 col-md-4 mb-5">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#foods" role="tab" aria-controls="pills-home" aria-selected="true">ᴘᴀɴᴇꜱ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#juices" role="tab" aria-controls="pills-profile" aria-selected="false">ᴘᴀꜱᴛᴇʟᴇꜱ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <?php while ($renglon = mysqli_fetch_assoc($resultadoQuery)) {
                        if ($renglon['Destacado'] == "si" && $renglon['Clasificacion'] == "Pan") { ?>
                            <div class="col-md-4">
                                <div class="card bg-transparent border my-3 my-md-0">
                                    <img src="data:image/jpg;base64,<?= base64_encode($renglon['Foto']) ?>" alt="Foto del Producto" height="80%" width="100%">
                                    <div class="card-body">
                                        <h1 class="text-center mb-4"><a href="#" class="badge badge-primary" onclick="openModal('mainModal#<?= $renglon['IDProducto'] ?>')">$<?= $renglon['Precio'] ?></a></h1>
                                        <h4 class="pt20 pb20"><?= $renglon['Nombre'] ?></h4>
                                        <p class="text-white"><?= $renglon['Clasificacion'] ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
            <div class="tab-pane fade" id="juices" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    <?php while ($renglon2 = mysqli_fetch_assoc($resultadoQuery2)) {
                        if ($renglon2['Destacado'] == "si" && $renglon2['Clasificacion'] == "Pastel") { ?>
                            <div class="col-md-4 my-3 my-md-0">
                                <div class="card bg-transparent border">
                                    <img src="data:image/jpg;base64,<?= base64_encode($renglon2['Foto']) ?>" alt="Foto del Producto" height="80%" width="100%">
                                    <div class="card-body">
                                        <h1 class="text-center mb-4"><a href="#" class="badge badge-primary" onclick="openModal('mainModal#<?= $renglon2['IDProducto'] ?>')">＄<?= $renglon2['Precio'] ?></a></h1>
                                        <h4 class="pt20 pb20"><?= $renglon2['Nombre'] ?></h4>
                                        <p class="text-white"><?= $renglon2['Clasificacion'] ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <script src=".\js\see.js">
    </script>
</body>

</html>