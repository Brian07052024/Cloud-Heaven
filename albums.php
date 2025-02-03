<?php
    //IMPORTAR LA BASE DE DATOS
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config
    $id_sesion = 1;
    //QUERY/CONSULTA
    $consulta = "SELECT * FROM album WHERE id_usuario = $id_sesion";
    $resultado = mysqli_query($db, $consulta);
    

   
    require "includes/templates/header.php";
?>
        <main class="contenedor">
            <div class="contenedor-albums">
                <?php if (mysqli_num_rows($resultado) > 0): ?>
                    
                    <?php while ($album = mysqli_fetch_assoc($resultado)): ?>

                        <div class='album'>
                            <h3> <?php echo $album["nombre"] ?> </h3> 
                            <a href='ver_album.php?id_album=<?php echo $album["id"] ?>'>Ver imágenes</a>
                            
                            <a href='#' class='btn-eliminar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='32' fill='currentColor' class='bi bi-dash' viewBox='0 0 16 16'>
                                    <path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8'/>
                                </svg>
                            </a>
                        </div>

                    <?php endwhile; ?>

                <?php else: ?>
                    <p>No tienes álbumes disponibles.</p> <!-- Mensaje si no hay álbumes -->
                <?php endif; ?>

            </div>

            
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
</body>
</html>