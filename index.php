<?php
    require "includes/funciones.php";//requerimos el archivo de funciones para hacer uso de estas
    $auth = estaAutenticado();//usamos la funcion para ver si esta autenticado, si no, lo mandara al login...
    if(!$auth){
        header("Location: login.php");
    }
    


    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config

    $mensaje = $_GET["mensaje"] ?? null;

    require "includes/templates/header.php";

?>
        <main class="main">
            <nav class="navegacion-barra">
                <ul>
                    <li class="index-nav">
                        <a href="crear.php">Crear</a>
                        <a href="albums.php">Albums</a>
                        <a href="nosotros.php">Nosotros</a>
                        <a href="cuenta.php">Cuenta</a>
                    </li>
                </ul>
            </nav>

            <div class="index-gallery">
                <?php
                    include "includes/templates/anuncios.php";
                ?> 
            </div> 
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
    <script src="build/js/bundle.min.js"></script>
</body>
</html>

