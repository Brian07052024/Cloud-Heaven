<?php
    require "includes/templates/header.php";
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config

    $id_sesion = 1;

    $consulta = "SELECT * FROM album WHERE id_usuario = $id_sesion";
    $resultado = mysqli_query($db, $consulta);

   

?>
        <main class="contenedor">
            <div class="contenedor-albums">
                <?php
                    // Verificar si la consulta tuvo resultados
                    if (mysqli_num_rows($resultado) > 0) {
                        // Recorrer los resultados de la consulta y mostrarlos
                        while ($album = mysqli_fetch_assoc($resultado)) {
                            // Mostrar cada álbum dentro de un div
                            echo "<div class='album'>";
                            echo "<h3>" . htmlspecialchars($album['nombre']) . "</h3>"; // Muestra el nombre del álbum
                            echo "<a href='ver_album.php?id=" . $album['id'] . "'>Ver imágenes</a>"; // Enlace para ver las imágenes del álbum
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No tienes álbumes disponibles.</p>"; // Mensaje si no hay álbumes
                    }
                ?>
            </div>  
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
</body>
</html>