<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="../styles/table.css" />
    <link rel="stylesheet" href="../styles/forms.css" />
    <title>AyC | Agregar profesor</title>
</head>
<body>
    <div class="dashboard-container">
        <aside class="dashboard__aside">
            <h2 class="dashboard__aside_title">Menú</h2>
            <ul class="dashboard__aside_menu">
                <li>
                    <a href="./grupos.php">
                        <img src="../images/icons/grupo.png" />
                        Grupos
                    </a>
                </li>
                <li>
                    <a href="./alumnos.php">
                        <img src="../images/icons/alumno.png" />
                        Alumnos
                    </a>
                </li>
                <li>
                    <a href="./materias.php">
                        <img src="../images/icons/libro.png" />
                        Materias
                    </a>
                </li>
                <li>
                    <a href="./profesores.php" class="active">
                        <img src="../images/icons/profesor.png" />
                        Profesores
                    </a>
                </li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <h2>Agregar profesores</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <div class="main__options">
                <a href="./profesores.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Listar Profesores </p>
                </a>
                <a href="./agregar_profesor.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Agregar Profesor </p>
                </a>
            </div>
            <div class="content">
                <?php 
                    include("../db.php");
                    $name = "";
                    $email = "";
                    $idProfesor = "";
                    if(isset($_GET['edit'])) {
                        $idProfesor = $_GET['idprofesor'];
                        $query = "SELECT * FROM profesor WHERE idprofesor = $idProfesor";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result);
                        $idProfesor = $row['idprofesor'];
                        $name = $row['nombre'];
                        $email = $row['correo'];
                    }
                ?>
                <form action="./actions/save_profesor.php" class="forms" method="POST">
                    <input type="hidden" name="idprofesor" value="<?php echo  $idProfesor?>" />
                    <div class="forms__group">
                        <label for="username">Ingresa el nombre:</label>
                        <input type="text" id="username"
                        value="<?php echo $name ?>" 
                        name="name" class="field" required>     
                    </div>
                    <div class="forms__group">
                        <label for="email">Ingresa el correo:</label>
                        <input type="email" id="email" 
                        value="<?php echo $email ?>"
                        name="email" class="field" required>     
                    </div>
                    <button type="submit" 
                        name="<?php echo (isset($_GET['edit'])) ? "edit_profesor" : "save_docente" ?>" 
                        class="btn">Agregar nivel</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>