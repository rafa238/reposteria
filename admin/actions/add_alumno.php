<?php 
    
    include("../../db.php");

    if(isset($_POST['save_alumno'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $nivel = $_POST['nivel'];
        $query = "INSERT INTO alumno(nombre, correo, nivel) VALUES ('$name', '$email', '$nivel')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    } else if(isset($_GET['delete'])) {
        $id = $_GET['idalumno'];
        $query = "DELETE FROM alumno WHERE idalumno = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    } else if (isset($_POST['edit_alumno'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $nivel = $_POST['nivel'];
        $idalumno = $_POST['idalumno'];
        $query = "UPDATE alumno SET nombre='$name', correo='$email', nivel='$nivel' WHERE idalumno=$idalumno";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        } 
        echo $result;
    }
    $_SESSION['message'] = 'Alumno guardado exitosamente!';
    $_SESSION['status'] = 'exito';
    header("Location: ../alumnos.php");
?>