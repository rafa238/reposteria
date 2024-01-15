<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <title>Dashboard - Alumno</title>
</head>
<body>
    
    <div class="dashboard-container">
        <?php include("./aside.php") ?>

        <main class="main-content">
            <header class="main-header">
                <h2>Dashboard</h2>
            </header>

            <div class="content">
                <img src="../logo.png" alt="Logo Pastelería">
                <?php
                    include("../check_login.php");
                    $username = $_SESSION['username'];
                ?>
                <p>Bienvenido al Dashboard profesor <?php echo $username ?> </p>
            </div>
        </main>
    </div>
</body>
</html>