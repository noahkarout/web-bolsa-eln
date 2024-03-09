<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambia a la dirección de tu servidor si es diferente
$username = "bolsa_eln";
$password = "pmaadminbolsa";
$dbname = "bolsa_eln";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener los datos del formulario de inicio de sesión
$mail = $_POST['email']; // Cambiamos 'username' por 'email'
$contrasena = $_POST['password'];

// Hash y salt de la contraseña para verificarla en la base de datos (cambia 'tu_salto' por un valor real)
$salt = 'salt-de-seguridad-bolsa'; // Cambia esto por un valor único
$hashed_password = hash('sha256', $salt . $contrasena);

// Verificar las credenciales en la base de datos
$sql = "SELECT * FROM usuarios WHERE email = '$mail' AND contrasena = '$contrasena'"; // Cambiamos 'nombre_usuario' por 'email'
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Inicio de sesión exitoso, establecer variables de sesión
    session_start();
    $_SESSION['email'] = $mail; // Almacena el correo electrónico en la sesión

    // Redirecciona al usuario a la página de inicio
    header("Location: ../home.html"); // Cambia a la página que desees mostrar después del inicio de sesión
} else {
    // Credenciales incorrectas, muestra un mensaje de error
    header("Location: ../credencialesincorrectas.html");
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
