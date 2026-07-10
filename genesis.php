<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "genesis"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}
// Si llega aquí, la conexión es exitosa
?>