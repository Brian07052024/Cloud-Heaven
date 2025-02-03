<?php
    //CONECTAR A LA DATABASE
    require "config/database.php";
    $db = conectarDB();
    $id_sesion = 1; //sesion activa
    $id_album = intval($_GET["id_album"]);


    //QUERY/CONSULTA
    // Verificar que $id_album no esté vacío antes de hacer la consulta
    if ($id_album) {
        $query = "SELECT * FROM imagen WHERE id_album = $id_album";
        $resultado = mysqli_query($db, $query);
    } else {
        echo "No se ha encontrado el álbum.";
    }
    
   
    require "includes/templates/header.php";
?>
        <main class="contenedor">
            <nav class="nav_superior">
                <ul>
                    <li>
                        <a href='#'>Nosotros</a>
                        <a href='#'>Inicio</a>
                        <a href='#'>Mas</a>
                    </li>
                    <li>
                        <a hidden class="log-btn" href=""></a>
                        <a class="log-btn" href='agregar_imagenes.php'>Agregar Imagenes</a>
                    </li>
                </ul>
            </nav>
          
            <div class="gallery">
                <?php while($imagen = mysqli_fetch_assoc($resultado)): ?>
                    <div class="imagen">
                        <img src="imagenes/<?php echo $imagen["src"] . ".jpg"; ?>">
                        <p class="imagen_txt"> <?php echo $imagen["descripcion"] ?> </p>
                    </div>
                    
                <?php endwhile ?>
            </div>
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
</body>
</html>