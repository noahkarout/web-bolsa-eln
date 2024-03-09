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

// Obtener los datos del formulario de registro
$nombre_usuario = $_POST['username'];
$email = $_POST['email'];
$contrasena = $_POST['password'];

// Verificar si el correo o el nombre de usuario ya existen en la base de datos
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' OR email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // El correo o el nombre de usuario ya están en uso
    echo "El correo o el nombre de usuario ya están en uso.";
} else {
    // Hash y salt de la contraseña para mayor seguridad (cambia 'tu_salto' por un valor real)
    $salt = 'salt-de-seguridad-bolsa'; // Cambia esto por un valor único
    $hashed_password = hash('sha256', $salt . $contrasena);

    // Insertar los datos del nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre_usuario, email, contrasena) VALUES ('$nombre_usuario', '$email', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirecciona al usuario a la página de inicio
        header("Location: ../index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
