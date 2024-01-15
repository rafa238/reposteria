<?php 
    
    include("../../db.php");

    if(isset($_POST['save_materia'])){
        $name = $_POST['name'];
        $creditos = $_POST['creditos'];
        $nivel = $_POST['nivel'];
        $contenido = $_POST['contenido'];
        $query = "INSERT INTO materia(nombre, creditos, nivel, contenido) VALUES ('$name', '$creditos', '$nivel', '$contenido')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    } else if (isset($_POST['edit_materia'])) {
        $idmateria = $_POST['idmateria'];
        $name = $_POST['name'];
        $creditos = $_POST['creditos'];
        $nivel = $_POST['nivel'];
        $contenido = $_POST['contenido'];
        $query = "UPDATE materia SET nombre = '$name', creditos = $creditos, nivel = '$nivel', contenido = '$contenido' 
                    WHERE idmateria = $idmateria";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    } else if(isset($_GET['delete'])) {
        $idmateria = $_GET['idmateria'];
        $query = "DELETE FROM materia WHERE idmateria = $idmateria";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    }
    $_SESSION['message'] = 'Materia guardada exitosamente!';
    $_SESSION['status'] = 'exito';
    header("Location: ../materias.php");
?>