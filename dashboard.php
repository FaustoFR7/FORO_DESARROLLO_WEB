<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div><h2>Bienvenido a la mejor aplicación</h2></div>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
