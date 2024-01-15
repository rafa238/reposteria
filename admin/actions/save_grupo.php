<?php 
    include("../../db.php");

    if(isset($_POST['save_grupo'])){
        $profesor = $_POST['profesor'];
        $nivel = $_POST['nivel'];
        $query = "INSERT INTO grupo(nivel, profesor_idprofesor) VALUES ('$nivel', '$profesor')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        $header = "grupos.php";
        echo $result;
    } else if(isset($_POST['update_grupo'])) {
        $idGrupo = $_POST['grupo'];
        $profesor = $_POST['profesor'];
        $nivel = $_POST['nivel'];
        $query = "UPDATE grupo SET nivel = '$nivel', profesor_idprofesor = '$profesor' WHERE idgrupo = $idGrupo";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        }
        $header = "grupos.php";
        echo $result;
    }
    $_SESSION['message'] = 'Grupo guardado exitosamente!';
    $_SESSION['status'] = 'exito';
    header("Location: ../$header");
?>