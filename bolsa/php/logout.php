<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir la sesión actual (cerrar sesión)
session_destroy();

// Redirigir al usuario a la página de inicio
header("Location: ../access.html");
exit(); // Salir para evitar que el resto de la página se procese
?>
