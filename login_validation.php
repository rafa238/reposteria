<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("./db.php");
if (isset($_SESSION['id'])) {
    header("Location: ./alumnos/dashboard_alumnos.php");
    exit;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "admin"){
        header("Location: ./admin/alumnos.php");
        exit;
    }

    $query = "SELECT * FROM alumno WHERE correo = '$username' AND nombre = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['username'] = $password;
        $_SESSION['id'] = $row["idalumno"];
        // Redirigir a la página principal o a donde desees
        header("Location: ./alumnos/dashboard_alumnos.php");
        exit;
    } else {
        $query = "SELECT * FROM profesor WHERE correo = '$username' AND contrasena = '$password'";
        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $_SESSION['username'] = $row["nombre"];
            $_SESSION['id'] = $row["idprofesor"];
            // Redirigir a la página principal o a donde desees
            header("Location: ./profesores/dashboard_docentes.php");
            exit;   
        }
    }
    // Mensaje de error si las credenciales son incorrectas
    $error_message = "Credenciales incorrectas. Inténtalo de nuevo.";
}
?>
