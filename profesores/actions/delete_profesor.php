<?php 
    include("../../db.php");
    
    $idGrupo = $_GET['grupo'];
    $query = "DELETE FROM grupo WHERE idgrupo = $idGrupo";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query failed");
    } 
    echo $result;
    $_SESSION['message'] = 'Grupo eliminado exitosamente!';
    $_SESSION['status'] = 'exito';
    header("Location: ../edit_grupo.php?id_grupo=$idGrupo");
?>