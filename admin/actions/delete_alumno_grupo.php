<?php 
    include("../../db.php");
    
    $idAlumno = $_GET['alumno'];
    $idGrupo = $_GET['grupo'];
    $query = "DELETE FROM alumno_grupo WHERE alumno_idalumno = $idAlumno AND grupo_idgrupo = $idGrupo";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query failed");
    } 
    echo $result;
    $_SESSION['message'] = 'Alumno agregado exitosamente!';
    $_SESSION['status'] = 'exito';
    header("Location: ../edit_grupo.php?id_grupo=$idGrupo");
?>