<?php
$conn = new mysqli("localhost", "root", "", "genesis");
$tema_id = $_GET['tema_id'];

// Traemos las preguntas
// 1. Traer preguntas de forma ALEATORIA
$sql = "SELECT * FROM preguntas WHERE id_tema = $tema_id ORDER BY RAND()";
$resultado = $conn->query($sql);

$datos = [];
while($pregunta = $resultado->fetch_assoc()) {
    $p_id = $pregunta['id_pregunta'];

    // 2. Traer respuestas de forma ORDENADA (Sin RAND)
    // Aquí es donde garantizas que siempre se vean igual
    $sql_resp = "SELECT * FROM respuestas WHERE id_pregunta = $p_id ORDER BY id_respuesta ASC";
    $res_resp = $conn->query($sql_resp);

    $pregunta['respuestas'] = [];
    while($resp = $res_resp->fetch_assoc()) {
        $pregunta['respuestas'][] = $resp;
    }

    $datos[] = $pregunta;
}
echo json_encode($datos);
?>