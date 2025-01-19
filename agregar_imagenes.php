<?php
    require "includes/templates/header.php";
    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config

    $id_sesion = 1;

   

?>
        <main class="">
            <h1>Agregar Imagenes</h1>
            <form class="forms contenedor" method="POST" action="agregar_imagenes.php">  
                <fieldset>
                    <legend>Subir Imagen</legend>
                    <label for="src">Selecciona la imagen</label>
                    <input id="src" name="src" type="file">

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