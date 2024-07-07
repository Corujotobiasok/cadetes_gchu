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
    <title>Registro Cadete</title>
</head>
<body>
    <h2>Registro Cadete</h2>
    <form method="post" action="process_register_cadete.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        
        <label for="vehiculo">Vehículo:</label>
        <input type="text" id="vehiculo" name="vehiculo" required>
        <br>
        
        <!-- Otros campos específicos de cadete -->
        
        <button type="submit" name="register_cadete">Registrarse</button>
    </form>
</body>
</html>
