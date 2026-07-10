<?php
// guardar_partida.php
session_start(); // Necesitas saber quién está jugando
$conn = new mysqli("localhost", "root", "", "genesis");

// Recibimos los datos del juego (los envías desde JS)
$id_usuario = $_SESSION['usuario_id']; 
$id_tema = $_POST['id_tema']; 
$puntaje = $_POST['puntaje']; 

// Insertamos el resumen
$sql = "INSERT INTO historico (id_usuario, id_tema, puntaje) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $id_usuario, $id_tema, $puntaje);
$stmt->execute();
?>