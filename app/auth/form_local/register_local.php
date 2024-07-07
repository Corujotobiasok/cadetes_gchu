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
    <title>Registro Local</title>
</head>
<body>
    <h2>Registro Local</h2>
    <form method="post" action="process_register_local.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        
        <label for="nombre_local">Nombre del Local:</label>
        <input type="text" id="nombre_local" name="nombre_local" required>
        <br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>
        <br>
        
        <!-- Otros campos específicos de local -->
        
        <button type="submit" name="register_local">Registrarse</button>
    </form>
</body>
</html>
