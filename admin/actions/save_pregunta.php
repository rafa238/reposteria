<?php 
    
    include("../../db.php");

    if(isset($_POST['save_pregunta'])){
        $pregunta = $_POST['pregunta'];
        $nivel = $_POST['nivel'];
        $query = "INSERT INTO pregunta(pregunta, nivel) VALUES ('$pregunta', '$nivel')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    }
    $_SESSION['message'] = 'Pregunta guardado exitosamente!';
    $_SESSION['status'] = 'exito';
    header("Location: ../preguntas.php");
?>