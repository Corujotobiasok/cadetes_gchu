<?php
// Obtener el ID del usuario desde la URL
if (!isset($_GET['id'])) {
    header("Location: ../select_role.php");
    exit();
}
$user_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Cliente</title>
</head>
<body>
    <h2>Registro Cliente</h2>
    <form method="post" action="process_register_cliente.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        
        <!-- Otros campos específicos de cliente -->
        
        <button type="submit" name="register_cliente">Registrarse</button>
    </form>
</body>
</html>
