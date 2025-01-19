<?php
    require "includes/templates/header.php";
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config

    $id_sesion = 1;
    
   

?>
        <main class="">
            <a href="agregar_imagenes.php">Agregar Imagenes</a>
            
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
</body>
</html>