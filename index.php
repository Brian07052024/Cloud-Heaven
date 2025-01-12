<?php
    require "includes/templates/header.php";
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config


?>
        <main class="main">
            <h1>Populares</h1>
            <div class="carrusel">
                <div class="carrusel-img">
                    <img src="build/img/p1.webp" alt="">
                    <img src="build/img/p4.jpg" alt="">
                    <img src="build/img/p5.jpg" alt="">
                    <img src="build/img/p2.jpg" alt="">
                    <img src="build/img/p3.jpg" alt="">
                </div>
            </div>

            <h1>Año nuevo</h1>
            <div class="carrusel">
                <div class="carrusel-img">
                    <img src="build/img/ny1.jpg" alt="">
                    <img src="build/img/ny2.jpg" alt="">
                    <img src="build/img/ny3.jpeg" alt="">   
                </div>
            </div>

            <h1>Navidad</h1>
            <div class="carrusel">
                <div class="carrusel-img">
                    <img src="build/img/n1.jpg" alt="">
                    <img src="build/img/n2.jpg" alt="">
                    <img src="build/img/n3.jpg" alt="">
                </div>
            </div>
            
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
</body>
</html>