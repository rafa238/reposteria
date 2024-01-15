<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="../styles/table.css" />
    <link rel="stylesheet" href="../styles/forms.css" />
    <title>AyC | Agregar grupo</title>
</head>
<body>
    <div class="dashboard-container">
        <aside class="dashboard__aside">
            <h2 class="dashboard__aside_title">Menú</h2>
            <ul class="dashboard__aside_menu">
                <li>
                    <a href="./grupos.php" class="active">
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
                    <a href="./profesores.php">
                        <img src="../images/icons/profesor.png" />
                        Profesores
                    </a>
                </li>
                <li>
                    <a href="../login.php">
                        <img src="../images/icons/profesor.png" />
                        Logout
                    </a>
                </li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <h2>Agregar preguntas</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <div class="main__options">
                <a href="./preguntas.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Listar Preguntas </p>
                </a>
                <a href="./agregar_pregunta.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Agregar Preguntas </p>
                </a>
            </div>
            <div class="content">
                <form action="./actions/save_pregunta.php" method="POST" class="forms">
                    <div class="forms__group">
                        <label for="pregunta">Ingresa el pregunta:</label>
                        <input type="text" id="pregunta" name="pregunta" class="field" required>     
                    </div>
                    <div class="forms__group">
                        <label for="nivel">Ingresa el nivel:</label>
                        <input type="text" id="nivel" name="nivel" class="field" required>     
                    </div>
                    <button type="submit" name="save_pregunta" class="btn">Agregar grupo</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>