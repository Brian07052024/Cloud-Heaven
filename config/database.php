<?php

function conectarDB() : mysqli {
    $db = mysqli_connect("localhost", "root", "root", "vsco", 3307);

    if(!$db){
        echo "No se ha podido establecer coneccion con el servidor...";
        exit;
    }

    return $db;
}