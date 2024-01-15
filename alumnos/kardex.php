<?php include("../db.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="../styles/table.css" />
    
    <title>AyC | Kardex</title>
</head>
<body>
    <div class="dashboard-container">
        <?php include("./aside.php") ?>

        <main class="main-content">
            <header class="main-header">
                <h2>Kardex</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <div class="main__options">
                
            </div>
            <div class="content">
                    <table class="signatures">
                        <thead>
                            <th class="sign_head"> Id Materia </th>
                            <th class="sign_head"> Nombre Materia </th>
                            <th class="sign_head"> Calificacion</th>
                            <th class="sign_head"> Nivel </th>
                        </thead>
                        <tbody>
                            <?php 
                                include("../check_login.php");
                                $id = $_SESSION['id'];
                                $query ="SELECT historial_academico.*, materia.nombre as nombre_materia, materia.nivel
                                        FROM historial_academico
                                        INNER JOIN materia ON historial_academico.materia_idmateria = materia.idmateria
                                        WHERE historial_academico.alumno_idalumno = $id";
                                $result_tasks = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result_tasks)){ ?>

                            <tr class="sign_row">
                                <td class="sign_data"> <?php echo $row['materia_idmateria'] ?> </td>
                                <td class="sign_data"> <?php echo $row['nombre_materia'] ?> </td>
                                <td class="sign_data"> <?php echo $row['calificacion'] ?> </td>
                                <td class="sign_data"> <?php echo $row['nivel'] ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>

        </main>
    </div>
</body>
</html>