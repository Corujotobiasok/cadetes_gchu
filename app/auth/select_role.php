<?php
// Incluir archivo de configuración de la base de datos
require '../../db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Recibir y validar rol seleccionado
    $role = $_POST['role'];

    // Obtener datos del registro inicial almacenados en sesión
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

    // Insertar el usuario en la tabla `users`
    $sql = "INSERT INTO users (email, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $password, $role);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    // Redirigir al formulario específico según el rol
    if ($role == 'cliente') {
        header("Location: form_cliente/register_cliente.php?id=$user_id");
    } elseif ($role == 'local') {
        header("Location: form_local/register_local.php?id=$user_id");
    } elseif ($role == 'cadete') {
        header("Location: form_cadete/register_cadete.php?id=$user_id");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Rol</title>
</head>
<body>
    <h2>Seleccionar Rol</h2>
    <form method="post" action="select_role.php">
        <input type="radio" id="cliente" name="role" value="cliente" required>
        <label for="cliente">Cliente</label><br>
        
        <input type="radio" id="local" name="role" value="local" required>
        <label for="local">Local</label><br>
        
        <input type="radio" id="cadete" name="role" value="cadete" required>
        <label for="cadete">Cadete</label><br>
        
        <button type="submit" name="submit">Registrarse</button>
    </form>
</body>
</html>
