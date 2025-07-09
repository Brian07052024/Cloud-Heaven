<?php
    require "includes/funciones.php";
    $auth = estaAutenticado();
    if(!$auth){
        header("Location: login.php");
    }
    //IMPORTAR LA BASE DE DATOS
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config
    $id_sesion = intval($_SESSION["id"]);

    // var_dump($_SESSION);

    //QUERY/CONSULTA
    $consulta = "SELECT * FROM album WHERE id_usuario = $id_sesion";
    $resultado = mysqli_query($db, $consulta);

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $id = intval($_POST["id"]);
        if($id){
            $query = "DELETE FROM album WHERE id = $id";
            mysqli_query($db, $query);
            // Volver a consultar la base de datos después de borrar
            $consulta = "SELECT * FROM album WHERE id_usuario = $id_sesion";
            $resultado = mysqli_query($db, $consulta);
        }
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
                            
                            <form class="btn-eliminar" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas borrar este álbum?');">
                                <input type="hidden" name="id" value="<?php echo $album["id"]; ?>">
                                <input type="submit" value="Delete">
                            </form>
                            
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