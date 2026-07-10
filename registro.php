<?php
include("genesis.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$rol = 'usuario';
$puntaje = 0;
$pass_plana = $_POST['contraseña']; 
$contraseña = password_hash($pass_plana, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nombre, correo, rol, puntaje, contraseña) 
        VALUES ('$nombre', '$correo', '$rol', '$puntaje', '$contraseña')";

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Inscripción Exitosa</title>
    <link href='https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap' rel='stylesheet'>
    <style>
        body {
            background-color: #3d1a4f; /* El morado oscuro de tu tema */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Cinzel', serif;
            background-image: radial-gradient(circle, rgba(107,45,94,0.3) 0%, rgba(26,14,10,1) 100%);
        }
        .mensaje-flotante {
            background: #f0e6c8; /* Color pergamino */
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5), inset 0 0 20px rgba(139,74,47,0.2);
            border: 2px solid #c9973a; /* Dorado */
            max-width: 400px;
            animation: aparecer 0.8s ease-out;
        }
        @keyframes aparecer {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 { color: #7b588d; margin-bottom: 20px; letter-spacing: 2px; }
        p { color: #5c3317; font-size: 18px; margin-bottom: 30px; }
        .btn-volver {
            background: linear-gradient(135deg, #a87ba1, #cebe78);
            color: #f0e6c8;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid #c9973a;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 14px;
            transition: 0.3s;
            display: inline-block;
        }
        .btn-volver:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px #c9973a;
        }
    </style>
</head>
<body>";

if ($conn->query($sql) === TRUE) {
    echo "
    <div class='mensaje-flotante'>
        <h2>⚜ ¡LO LOGRASTE! ⚜</h2>
        <p>Tu identidad ha sido grabada con éxito en los registros de GENESIS.</p>
        <a href='Iniciar.html' class='btn-volver'>Volver al Inicio</a>
    </div>";
} else {
    echo "
    <div class='mensaje-flotante' style='border-color: #8b2a1a;'>
        <h2 style='color: #8b2a1a;'>Error de Registro</h2>
        <p>Parece que hubo un problema con el pergamino: " . $conn->error . "</p>
        <a href='registrate.html' class='btn-volver'>Intentar de nuevo</a>
    </div>";
}

echo "</body></html>";

$conn->close();
?>