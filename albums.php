<?php
    //IMPORTAR LA BASE DE DATOS
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config
    $id_sesion = 1;
    //QUERY/CONSULTA
    $consulta = "SELECT * FROM album WHERE id_usuario = $id_sesion";
    $resultado = mysqli_query($db, $consulta);
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $id = intval($_POST["id"]);

        if($id){
            $query = "DELETE FROM album WHERE id = $id";
            $resultado = mysqli_query($db, $query);

            if($resultado){
                header("Location: index.php");
            }
        }

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";    
    }
   
    require "includes/templates/header.php";
?>
        <main class="contenedor">
            <div class="contenedor-albums">
                <?php if (mysqli_num_rows($resultado) > 0): ?>
                    
                    <?php while ($album = mysqli_fetch_assoc($resultado)): ?>

                        <div class='album'>
                            <h3> <?php echo $album["nombre"] ?> </h3> 
                            <a href='ver_album.php?id_album=<?php echo $album["id"] ?>'>Ver imágenes</a>
                            
                            <form class="btn-eliminar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $album["id"]; ?>">
                                <input type="submit" value="Eliminar">
                            </form>
                            <!-- <a href='#' class='btn-eliminar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='32' fill='currentColor' class='bi bi-dash' viewBox='0 0 16 16'>
                                    <path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8'/>
                                </svg>
                            </a> -->
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