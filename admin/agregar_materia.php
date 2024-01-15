<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="../styles/table.css" />
    <link rel="stylesheet" href="../styles/forms.css" />
    <title>AyC | Agregar materia </title>
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
                    <a href="./materias.php" class="active">
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
                <h2>Agregar Materia</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <div class="main__options">
                <a href="./materias.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Listar materias </p>
                </a>
                <a href="./agregar_grupo.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Agregar materia </p>
                </a>
            </div>
            <div class="content">
                <form action="./actions/save_materia.php" class="forms" method="POST">
                    <div class="forms__group">
                        <label for="username">Ingresa el nombre:</label>
                        <input type="text" id="username" name="name" class="field" required>     
                    </div>
                    <div class="forms__group">
                        <label for="creditos">Ingresa el creditos:</label>
                        <input type="number" id="creditos" name="creditos" class="field" required>     
                    </div>
                    <div class="forms__group">
                        <label for="nivel">Ingresa el nivel:</label>
                        <input type="number" id="nivel" name="nivel" class="field" required>     
                    </div>
                    <div class="forms__group">
                        <label for="contenido">Ingresa el link al contenido del programa:</label>
                        <input type="text" id="contenido" name="contenido" class="field" required>     
                    </div>
                    <button type="submit" class="btn" name="save_materia" >Agregar grupo</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>