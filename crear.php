<?php
    require "includes/funciones.php";
    $auth = estaAutenticado();
    if(!$auth){
        header("Location: login.php");
    }
    // require "includes/templates/header.php";
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config

    $consulta = "SELECT * FROM album";
    $resultado = mysqli_query($db, $consulta); //toma 2 parametros: la database y la consulta, en este caso a la tabla album

    //revision de errores con sus variables
    $errores = [];
    $nombre = "";
    $id_usuario = intval($_SESSION["id"]);



    //fin de revision/validacion errores en campos
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        //recoje los valores de los campos
        $nombre = mysqli_real_escape_string($db, $_POST["nombre"]);

        if(!$nombre || (strlen($nombre) < 3)){
            $errores[] = "El campo de nombre no puede estar vacío ni tener menos de 3 caraceteres...";
        }

        if(!$errores){//si no hay errores, entonces:
            //insertarlos a la db:
            $query = "INSERT INTO album (nombre, id_usuario) VALUES ('$nombre', '$id_usuario')";
            $resultado = mysqli_query($db, $query);
            if($resultado){
                $exito = "¡Álbum creado exitosamente!";
            } else {
                $errores[] = "Hubo un error al crear el álbum.";
            }
        }
  
    }
    require "includes/templates/header.php";
?>

        <main class="main-crear">
            <?php if(isset($exito)): ?>
                <div class="exito" id="mensaje-exito">
                    <?php echo $exito; ?>
                </div>
                <script>
                setTimeout(function() {
                    var msg = document.getElementById('mensaje-exito');
                    if(msg) { msg.style.opacity = '0'; msg.style.transition = 'opacity 0.5s'; setTimeout(function(){msg.style.display = 'none';}, 500); }
                }, 3000);
                </script>
            <?php endif; ?>
            <form class="forms contenedor" method="POST" action="crear.php">  
                <fieldset>
                    <legend>Nuevo Album</legend>
                    <label for="nombre">Nombre Del Album:</label>
                    <input id="nombre" name="nombre" placeholder="Ejemplo: Favoritos" type="text">
                </fieldset>

                <div class="atton">
                    <p>¡Crea un increible album y dale un nombre unico para que puedas comenzar a guardar y compartir tantos momentos como quieras!</p>  
                </div>
                
                <button class="forms-btn" type="submit">Crear</button>

            </form><!-- FIN FORMS -->

            <?php foreach($errores as $error):?>
                <div class="error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>
            
        </main><!-- FIN MAIN -->
    </div><!-- FIN PRINCIPAL -->
</body>
</html>