<?php
    require "includes/funciones.php";
    $auth = estaAutenticado();
    if(!$auth){
        header("Location: login.php");
    }
    //CONECTAR DB
    require "config/database.php";
    $db = conectarDB();
    //CONSULTA A LA DB
    $consulta = "SELECT * FROM imagen";
    $resultado = mysqli_query($db, $consulta);
    

    $errores = [];
    $descripcion = "";
    $imagen = "";

    $id_album = intval($_POST["id_album"] ?? $_GET["id_album"] ?? 0);
    // var_dump($id_album);//2020202022 
    $id_usuario = intval($_SESSION["id"]);
   
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
        $imagen = $_FILES["src"];

        if(!$descripcion || (strlen($descripcion) > 50)){
            $errores[] = "El campo descripcion no puede estar vacío ni tener más de 50 caraceteres.";
        }

        if(!$imagen["name"]){
            $errores[] = "La imagen es obligatoria";
        }
        
        //validar tamaño
        // $bitsToKilobits = 1000 * 100;

        // if($imagen["size"] > $bitsToKilobits){
        //     $errores[] = "La imagen es muy pesada";
        // }

        if(empty($errores)){

            $carpetaImagenes = __DIR__ . '/imagenes/'; //creamos la carpeta donde estaran las imagenes o ruta

            if(!is_dir($carpetaImagenes)){//si no existe la carpeta, la creamos
                mkdir($carpetaImagenes);
            }

            //nombrar la imagen con nombre unico
            $nombreImagen = md5(uniqid(rand(), true));
            
            //subir la imagen
            move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . $nombreImagen . ".jpg");


            $query = "INSERT INTO imagen (src, descripcion, id_album) VALUES ('$nombreImagen','$descripcion', '$id_album')";

            $resultado = mysqli_query($db, $query);

            if($resultado){
                header("Location: albums.php");
                echo "Insertado correctamente en la db";
            }
        }
    }
    require "includes/templates/header.php";

?>
        <main class="">
            <h1 class="add-img">Agregar Imagenes</h1>
            <form class="forms contenedor" method="POST" action="agregar_imagenes.php" enctype="multipart/form-data">  
                <fieldset>
                    <legend>Subir Imagen</legend>
                    <label for="src">Selecciona la imagen</label>
                    <input id="src" name="src" type="file" accept="image/jpeg, image/png">

                    <label for="descripcion">Descripcion de imagen</label>
                    <input id="descripcion" name="descripcion" type="text" placeholder="Ejemplo: Dia de vacaciones!">
                </fieldset>

                <div class="atton">
                    <p>¡Crea un increible album y dale un nombre unico para que puedas comenzar a guardar y compartir tantos momentos como quieras!</p>  
                </div>
                <input type="hidden" name="id_album" value="<?php echo htmlspecialchars($id_album); ?>">
                <button class="forms-btn" type="submit">Crear</button>

            </form><!-- FIN FORMS -->
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
</body>
</html>