<?php
   include('conexionBD.php');  
   $id = $_SESSION['user_session']['IDUsuario'];
    $query = "SELECT * FROM usuarios WHERE IDUsuario = '$id'";
    $resultadoQuery = mysqli_query($miConexion, $query);
    $dato = mysqli_fetch_assoc($resultadoQuery);
?>
<!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
            <form method="POST" name="formProductos" id="formProductos" action="Pedidos/ProcesoPedido.php" enctype="multipart/form-data">
                <input type="hidden" name="IDUsuario" value="<?php echo $dato['IDUsuario']; ?>">
                <h2 class="section-title mb-5">✦•·······• 𝒫𝐸𝒟𝐼𝒟𝒪𝒮 •·······•✦</h2>

                <div class="row mb-5">

                    <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                        <input type="email" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="EMAIL">
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                        <input type="number" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="NUMBER OF BREAD'S" max="20" min="0">
                    </div>
                    <br/>
                    <label class="col-sm-6 col-md-3 col-xs-12 my-2 form-control form-control-lg custom-form-control" for="opciones">Elige una opción:</label>
                    <select class="form-control" id="opciones" name="opciones">
                        <option  value="Muffins">Muffins</option>
                        <option  value="Donas">Donas</option>
                        <option  value="Macarons">Macarons</option>
                        <option  value="Concha">Concha</option>
                        <option  value="Pastel_de_Chocolate">Pastel de Chocolate</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-lg btn-primary" id="rounded-btn" value="ᴘᴇᴅɪʀ">
            </form>
        </div>
    </div>