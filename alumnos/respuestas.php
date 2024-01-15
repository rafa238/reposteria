<?php
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respuestas = $_POST["respuestas"];
    $idalumno = $_POST["idalumno"];
    foreach ($respuestas as $id_pregunta => $respuesta) {
        $query = "INSERT INTO cuestionario (idpregunta, idalumno, respuesta) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "iss", $id_pregunta, $idalumno, $respuesta);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            die("Query failed");
        }

        echo $result;
    }
    header("Location: ./horario.php");
    exit;
}
?>