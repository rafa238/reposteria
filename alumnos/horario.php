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
    <?php include("../db.php")?>
    <div class="dashboard-container">
        <?php include("./aside.php") ?>

        <main class="main-content">
            <header class="main-header">
                <h2>Inscripcion Actual</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <?php 
                include("../check_login.php");
                $id = $_SESSION['id'];
                $query ="SELECT alumno_grupo.grupo_idgrupo AS id_grupo, profesor.nombre AS nombre_profesor, alumno_grupo.calificacion as calificacion, alumno.nivel as nivel
                        , alumno.calificado as calificado
                        FROM alumno
                        JOIN alumno_grupo ON alumno.idalumno = alumno_grupo.alumno_idalumno
                        JOIN grupo ON alumno_grupo.grupo_idgrupo = grupo.idgrupo
                        JOIN profesor ON grupo.profesor_idprofesor = profesor.idprofesor
                        WHERE alumno.idalumno = $id";
                $result_tasks = mysqli_query($conn, $query);    
                $row = mysqli_fetch_array($result_tasks);
            ?>
            <div class="main__options">
                <p class="options_text">
                    Calificacion: <b><?php echo  $row["calificacion"]?></b>
                </p>
                <p class="options_text">
                    Profesor: <b><?php echo  $row["nombre_profesor"]?></b>
                </p>
                <?php
                    if($row["calificado"] == 0) {
                ?>
                    <a href="./prueba.php?nivel=<?php echo $row["nivel"] ?>&id=<?php echo $id ?>">
                        <img src="../images/icons/boton-agregar.png" />
                        <p> Realizar prueba </p>
                    </a>
                <?php } ?>
            </div>
            <div class="content">
                <table class="signatures">
                    <thead>
                        <th class="sign_head"> Id Materia </th>
                        <th class="sign_head"> Nombre Materia </th>
                        <th class="sign_head"> Nivel </th>
                        <th class="sign_head"> Acciones </th>
                    </thead>
                    <tbody>
                        <?php 
                            include("../check_login.php");
                            
                            $query ="SELECT alumno.idalumno, alumno.nivel, materia.idmateria, materia.nombre, materia.contenido
                            FROM alumno
                            INNER JOIN materia ON materia.nivel = alumno.nivel
                            WHERE alumno.idalumno = $id";
                            $result_tasks = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_tasks)){ ?>

                        <tr class="sign_row">
                            <td class="sign_data"> <?php echo $row['idmateria'] ?> </td>
                            <td class="sign_data"> <?php echo $row['nombre'] ?> </td>
                            <td class="sign_data"> <?php echo $row['nivel'] ?> </td>

                            <td class="sign_data">
                                <a class="btn" target="__blank" href='<?php echo $row['contenido'] ?>'>
                                    Ver contenido
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