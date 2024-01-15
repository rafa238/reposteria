<?php 
    //añadir alumno a un grupo en especifico
    include("../../db.php");
    
    if(isset($_POST['add_alumno'])){
        $idAlumno = $_POST['alumno'];
        $idGrupo = $_POST['grupo'];
        $query = "INSERT INTO alumno_grupo (alumno_idalumno, grupo_idgrupo, calificacion) VALUES ($idAlumno, $idGrupo, 0)";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    }
    $_SESSION['message'] = 'Alumno agregado exitosamente!';
    $_SESSION['status'] = 'exito';
    header("Location: ../grupos.php");
?>