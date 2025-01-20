<?php
    require "includes/templates/header.php";
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config
    $consulta = "SELECT * FROM imagen";
    
    $resultado = mysqli_query($db, $consulta);
    
    $errores = [];
    $descripcion = "";
    $imagen = "";

    $id_album = 11;

    $id_usuario = 1;
   
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
        $imagen = $_FILES["src"];
        $id_album = 11;

        if(!$descripcion || (strlen($descripcion) > 50)){
            $errores[] = "El campo descripcion no puede estar vacío ni tener más de 50 caraceteres.";
        }
        
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
                echo "Insertado correctamente en la db";
            }
        }
    }
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
                
                <button class="forms-btn" type="submit">Crear</button>

            </form><!-- FIN FORMS -->
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
</body>
</html>