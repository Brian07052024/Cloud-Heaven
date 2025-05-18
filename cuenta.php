<?php
    require "includes/funciones.php";
    $auth = estaAutenticado();
    if(!$auth){
        header("Location: login.php");
    }


    require "config/database.php";
    $db = conectarDB();//osea tiene que ser true el valor desde la database en /config

    $mensaje = $_GET["mensaje"] ?? null;
    
    require "includes/templates/header.php";

?>

<main class="nosotros contenedor">
    <h1>Cuenta</h1>
    <div class="card-account">
        <h2>Estado de la cuenta:</h2>
        <p class="pe">Cuenta activa</p>

        <div class="span-account">
            <p>Credenciales validas hasta el 14/05/2030</p> 
        </div>
        
    </div>
</main>