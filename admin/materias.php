<?php include("../db.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="../styles/table.css" />
    
    <title>AyC | Lista materias</title>
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
                <h2>Listar materias</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <div class="main__options">
                <a href="./materias.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Listar Materias </p>
                </a>
                <a href="./agregar_materia.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Agregar Matera </p>
                </a>
            </div>
            <div class="content">
                    <table class="signatures">
                        <thead>
                            <th class="sign_head"> Id materia </th>
                            <th class="sign_head"> Nombre </th>
                            <th class="sign_head"> Cr&eacute;ditos </th>
                            <th class="sign_head"> Nivel </th>
                            <th class="sign_head"> Contenido </th>
                        </thead>
                        <tbody>
                            <?php 
                                $query ="SELECT * FROM materia";
                                $result_tasks = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result_tasks)){ ?>
                                <tr class="sign_row">
                                    <td class="sign_data"> <?php echo $row["idmateria"] ?> </td>
                                    <td class="sign_data"> <?php echo $row["nombre"] ?> </td>
                                    <td class="sign_data"> <?php echo $row["creditos"] ?> </td>
                                    <td class="sign_data"> <?php echo $row["nivel"] ?> </td>
                                    <td class="sign_data">
                                        <a class="btn" href="<?php echo $row["contenido"] ?>">
                                            Ver
                                        </a>
                                        <a class="btn" href="#">
                                            Editar
                                        </a>
                                        <a class="btn" href="#">
                                            Eliminar
                                        </a>
                                    </td>   
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>

        </main>
    </div>
</body>
</html>