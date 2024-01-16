<?php 
    include("../../db.php");
    
    $idAlumno = $_POST['idalumno'];
    $calificacion = $_POST['calificacion'];
    $query = "UPDATE alumno_grupo SET alumno_grupo.calificacion = $calificacion WHERE alumno_grupo.alumno_idalumno = $idAlumno";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query failed");
    } 
    echo $result;
    $_SESSION['message'] = 'Alumno cambiado exitosamente!';
    $_SESSION['status'] = 'exito';
    header("Location: ../calificar.php?idalumno=$idAlumno");
?>