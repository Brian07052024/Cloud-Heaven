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
            <?php if(intval($mensaje) === 1): ?>
                <div class="alerta correcto">
                    <p>Album Creado</p>
                </div>
            <?php endif; ?>

            <div class="carrusel">
                <h1>Populares</h1>
                <div class="carrusel-img">
                    <img src="build/img/p1.webp" alt="">
                    <img src="build/img/p4.jpg" alt="">
                    <img src="build/img/p5.jpg" alt="">
                    <img src="build/img/p2.jpg" alt="">
                    <img src="build/img/p3.jpg" alt="">
                </div>
            </div>

            <div class="carrusel">
                <h1>Año nuevo</h1>
                <div class="carrusel-img">
                    <img src="build/img/ny1.jpg" alt="">
                    <img src="build/img/ny2.jpg" alt="">
                    <img src="build/img/ny3.jpeg" alt="">   
                </div>
            </div>

            <div class="carrusel">
                <h1>Navidad</h1>
                <div class="carrusel-img">
                    <img src="build/img/n1.jpg" alt="">
                    <img src="build/img/n2.jpg" alt="">
                    <img src="build/img/n3.jpg" alt="">
                </div>
            </div>
            
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
    <script src="build/js/bundle.min.js"></script>
</body>
</html>