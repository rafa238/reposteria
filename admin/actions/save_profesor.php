<?php 
    
    include("../../db.php");

    if(isset($_POST['save_docente'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $query = "INSERT INTO profesor(nombre, correo) VALUES ('$name', '$email')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    } else if (isset($_GET['deleteprofesor'])) {
        $idprofesor = $_GET['idprofesor'];
        $query = "DELETE FROM profesor WHERE idprofesor=$idprofesor";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    } else if (isset($_POST['edit_profesor'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $idprofesor = $_POST['idprofesor'];
        $query = "UPDATE profesor SET nombre='$name', correo='$email' WHERE idprofesor=$idprofesor";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    }
    $_SESSION['message'] = 'Docente guardado exitosamente!';
    $_SESSION['status'] = 'exito';
    header("Location: ../profesores.php");
?>