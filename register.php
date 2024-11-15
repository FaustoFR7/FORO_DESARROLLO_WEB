<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validaciones básicas
    if (strlen($password) < 8 || strlen($password) > 12 || !preg_match("/^[A-Za-z0-9]+$/", $password)) {
        echo "La contraseña debe tener entre 8 y 12 caracteres, y solo contener letras y números.";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
        } else {
            echo "Error al registrarse: " . $stmt->error;
        }
        $stmt->close();
    }
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Registro</h2>
    <form action="register.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required minlength="8" maxlength="12">
        <br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
