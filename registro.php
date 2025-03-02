<?php
    require "config/database.php";
    $db = conectarDB(); // Asegúrate de que la función existe y retorna una conexión válida

    $errores = [];
    $username = "";
    $email = "";
    $password = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Recolectar datos del formulario
        $username = mysqli_real_escape_string($db, $_POST["username"] ?? "");
        $email = mysqli_real_escape_string($db, $_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";

        // Validaciones
        if (!$username) {
            $errores[] = "El campo de usuario está vacío";
        }

        if (!$email) {
            $errores[] = "El campo de email está vacío";
        }

        if (!$password) {
            $errores[] = "El campo de contraseña está vacío";
        } else {
            // Hashear la contraseña para seguridad
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        }

        // Si no hay errores, insertar en la DB
        if (empty($errores)) {
            $query = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$passwordHash')";
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('Location: index.php');
                exit;
            } else {
                $errores[] = "Hubo un error al guardar en la base de datos.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Cloud Heaven</title>
</head>

<main class="login-forms">
    <div class="login-left">
        
        <a href="index.php" class="login-logo">
            <img src="src/img/EX-LOGO.png" alt="">
            <p>Cloud <span>Heaven</span></p>
        </a>
    </div>
    <div class="login-right">
        <form class="forms contenedor" method="POST" action="registro.php">
            <fieldset>
                <legend>Registro</legend>

                <label for="username">Username:</label>
                <input id="username" name="username" type="text" placeholder="Tu nombre">

                <label for="correo">Correo:</label>
                <input id="email" name="email" type="email" placeholder="ejemplo: user@org.com">

                <label for="password">contraseña:</label>
                <input id="password" name="password" type="password" placeholder="contraseña segura">
            </fieldset>

            <button class="forms-btn" type="submit">Iniciar sesion</button>    
        </form>
        <div class="error_container">
            <?php foreach($errores as $error):?>
                    <div class="error">
                        <?php echo $error; ?>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>