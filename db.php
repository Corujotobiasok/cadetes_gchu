<?php
// Configuración de la base de datos 
$servername = "localhost"; // XAMPP usualmente usa 'localhost' para el servidor MySQL
$username = "root";
$password = "";
$dbname = "cadete_app";

// Crear conexión 
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>
