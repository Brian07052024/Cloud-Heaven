<?php
require "includes/funciones.php";
$auth = estaAutenticado();
if (!$auth) {
    header("Location: login.php");
}
//CONECTAR A LA DATABASE
require "config/database.php";
$db = conectarDB();
$id_album = intval($_GET["id_album"]);




//QUERY/CONSULTA
// Verificar que $id_album no esté vacío antes de hacer la consulta
if ($id_album) {
    $query = "SELECT * FROM imagen WHERE id_album = $id_album";
    $resultado = mysqli_query($db, $query);
} else {
    echo "No se ha encontrado el álbum.";
}

// $iniciado = true;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST["id"]);

    if ($id) {
        $query = "DELETE FROM imagen WHERE id = $id";
        $resultado = mysqli_query($db, $query);

        $query = "SELECT * FROM imagen WHERE id_album = $id_album";
        $resultado = mysqli_query($db, $query);
    }
}

require "includes/templates/header.php";
?>
<main class="main">
    <nav class="nav_superior navegacion-barra">
        <ul>
            <li>
                <a href='#'>Nosotros</a>
                <a href='#'>Inicio</a>
                <a href='#'>Mas</a>
            </li>
            <li>
                <a hidden class="log-btn" href=""></a>
                <a class="log-btn" href='agregar_imagenes.php?id_album=<?php echo $id_album; ?>'>Agregar Imágenes</a>
            </li>
        </ul>
    </nav>

    <div class="gallery">
        <?php while ($imagen = mysqli_fetch_assoc($resultado)): ?>
            <div class="imagen img-scale">

               
                <form class="btn-eliminar" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas borrar esta imagen?');">
                    <input type="hidden" name="id" value="<?php echo $imagen["id"]; ?>">
                    <input type="submit" value="Delete">
                </form>
                

                <img src="imagenes/<?php echo $imagen["src"] . ".jpg"; ?>">
                <p class="desc-img"><?php echo $imagen["descripcion"] ?></p>
              
            </div>

        <?php endwhile ?>
    </div>
</main><!-- FIN MAIN -->
</body>

</html>