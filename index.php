<?php
    // var_dump($_SESSION);
    require "includes/funciones.php";
    $auth = estaAutenticado();
    if(!$auth){
        header("Location: login.php");
    }
    // var_dump($_SESSION);


    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config

    $mensaje = $_GET["mensaje"] ?? null;

    // echo "<pre>";
    // var_dump($_GET);
    // echo "</pre>";
    
    require "includes/templates/header.php";

?>
        <main class="main">
            <nav class="navegacion-barra">
                <ul>
                    <li class="index-nav">
                        <a href="">Crear</a>
                        <a href="">Albums</a>
                        <a href="">Nosotros</a>
                        <a href="">Cuenta</a>
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

