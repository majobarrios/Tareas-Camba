<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si tu usuario es diferente
$password = ""; // Normalmente está vacío en XAMPP
$dbname = "sistema_usuarios"; // Asegúrate de que esta base de datos exista

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$user = $_POST['username'];
$email = $_POST['email'];
$pass = ($_POST['password']); // Encriptación de la contraseña

// Insertar datos en la tabla usuarios
$sql = "INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("sss", $user, $email, $pass);

if ($stmt->execute()) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>




