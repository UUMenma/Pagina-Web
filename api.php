<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Activar la visualización de errores para depuración (solo para pruebas)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Usuario por defecto en XAMPP
$password = "";     // Contraseña vacía por defecto en XAMPP
$dbname = "api";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    echo json_encode(["error" => "Conexión fallida: " . $conn->connect_error]);
    exit;
}

// Consultar la tabla de clientes
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

// Crear un array para almacenar los datos
$clientes = array();

// Obtener los datos y almacenarlos en el array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
}

// Devolver los datos en formato JSON
echo json_encode($clientes);

// Cerrar la conexión
$conn->close();
?>
