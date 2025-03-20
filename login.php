<?php
// Conexión a la base de datos
$host = "localhost";
$dbname = "tienda2_bd";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta para verificar el usuario
    $sql = "SELECT * FROM usuario WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Si el usuario existe, crea una sesión
        $row = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['usuario_nombre'] = $row['nombre'];
        header("Location: index.html"); // Redirige a la página de edición
        exit();
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <h2>Iniciar sesión</h2>
    <form method="POST" action="">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>