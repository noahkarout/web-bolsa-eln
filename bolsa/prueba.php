<?php
session_start();

// Verificar si la sesión no está iniciada
if (!isset($_SESSION['email'])) {
    // Redirigir al usuario a la página de inicio si no se ha iniciado sesión
    header("Location: index.html");
    exit(); // Salir para evitar que el resto de la página se procese
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" type="image/png" href="images/logobolsaeln.png">
    <title>Inicio</title>
</head>
<body>
    <?php
    // Verificar si se ha iniciado sesión
    session_start();
    if (!isset($_SESSION['email'])) {
        // Redirigir al usuario a la página de inicio de sesión si no se ha iniciado sesión
        header("Location: access.html");
        exit(); // Salir para evitar que el resto de la página se procese
    }
    ?>

    <div class="container">
        <h1>Bienvenido</h1>
        <p>¡Hola, [Nombre de usuario]!</p>
        <p>Tu saldo actual es: [Saldo]</p>
        <a href="php/logout.php" class="logout-button">Cerrar Sesión</a>
    </div>
</body>
</html>
