<?php
// Incluir el archivo de configuración de la base de datos utilizando la ruta correcta
require_once '../../../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_cliente'])) {
    // Obtener datos del formulario
    $user_id = $_POST['user_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    // Insertar en la tabla `clientes`
    $sql = "INSERT INTO clientes (id, nombre, apellido) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // Manejo de errores de preparación de consulta
        die('Error de preparación de la consulta: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("iss", $user_id, $nombre, $apellido);

    if ($stmt->execute()) {
        // Redirigir o mostrar un mensaje de éxito
        header("Location: ../success.php"); // Ajusta la ruta según la estructura de tu proyecto
        exit();
    } else {
        // Manejar errores de inserción
        echo "Error al registrar el cliente: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../select_role.php"); // Redirigir si no se envió desde el formulario correcto
    exit();
}
?>
