<?php
// Incluir archivo de configuración de la base de datos
require '../../db.php';

// Manejar el envío del formulario de login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta para obtener el usuario
    $sql = "SELECT id, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    // Verificar si el usuario existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password, $role);
        $stmt->fetch();

        // Verificar la contraseña
        if (password_verify($password, $hashed_password)) {
            // Iniciar la sesión y almacenar la información del usuario
            session_start();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;

            // Redirigir al dashboard correspondiente según el rol
            if ($role == 'cliente') {
                header("Location: app/cliente_dashboard.php");
            } elseif ($role == 'local') {
                header("Location: app/local_dashboard.php");
            } elseif ($role == 'cadete') {
                header("Location: app/cadete_dashboard.php");
            }
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "No se encontró una cuenta con ese correo electrónico.";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" name="login">Iniciar Sesión</button>
        <p>no tienes cuenta? <a href="register.php">haz click aqui</a></p>
        </form>
</body>
</html>
