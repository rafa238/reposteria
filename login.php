<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css" />
    <link rel="stylesheet" href="./styles/login.css" />
    <title>Login - Pastelería</title>
</head>
<body class="container">
    <div class="login-container">
        <h1>Bienvenido a Azucar y Crema</h1>
        <?php 
            session_start();
            if (isset($_SESSION['id'])) {
                header("Location: ./alumnos/dashboard_alumnos.php");
                exit;
            }
        ?>
        <form method="POST" action="./login_validation.php">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" class="field" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" class="field required">

            <button type="submit" name="login" class="btn">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>