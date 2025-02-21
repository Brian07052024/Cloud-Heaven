<?php
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config

    $mensaje = $_GET["mensaje"] ?? null;

    // echo "<pre>";
    // var_dump($_GET);
    // echo "</pre>";

    require "includes/templates/header.php";
?>
        <main class="main">

            
            <?php
                include "includes/templates/anuncios.php";
            ?>            
            
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
    <script src="build/js/bundle.min.js"></script>
</body>
</html>

