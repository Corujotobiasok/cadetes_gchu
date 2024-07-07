<?php
// Incluir archivo de configuración de la base de datos
require '../../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    // Recibir y validar datos del formulario
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verificar si el correo ya está registrado
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "El correo electrónico ya está registrado.";
    } else {
        // Almacenar datos en sesión para usar en la siguiente etapa
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        // Redirigir al usuario a seleccionar su rol
        header("Location: select_role.php");
        exit();
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="register.php">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" name="register">Siguiente</button>
    </form>
</body>
</html>
