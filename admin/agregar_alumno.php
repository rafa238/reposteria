<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="../styles/table.css" />
    <link rel="stylesheet" href="../styles/forms.css" />
    <title>AyC | Agregar alumno</title>
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
                    <a href="./alumnos.php" class="active">
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
                    <a href="./profesores.php">
                        <img src="../images/icons/profesor.png" />
                        Profesores
                    </a>
                </li>
                
            </ul>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <h2>Agregar nuevo Alumno</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <div class="main__options">
                <a href="./alumnos.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Listar Alumnos </p>
                </a>
                <a href="./agregar_alumno.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Agregar Alumno </p>
                </a>
            </div>
            <div class="content">
                <form action="./actions/add_alumno.php" class="forms" method="POST">
                    <div class="forms__group">
                        <label for="username">Ingresa el nombre:</label>
                        <input type="text" id="username" name="name" class="field" required>     
                    </div>
                    <div class="forms__group">
                        <label for="email">Ingresa el correo:</label>
                        <input type="email" id="email" name="email" class="field" required>     
                    </div>
                    <div class="forms__group">
                        <label for="nivel">Ingresa el nivel:</label>
                        <input type="text" id="nivel" name="nivel" class="field" required>     
                    </div>
                    <button type="submit" name="save_alumno" class="btn">Agregar nivel</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>