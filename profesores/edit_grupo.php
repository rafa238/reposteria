<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="../styles/table.css" />
    <link rel="stylesheet" href="../styles/forms.css" />
    <title>AyC | Grupo</title>
</head>
<body>
    <div class="dashboard-container">
        <?php include("./aside.php") ?>

        <main class="main-content">
            <header class="main-header">
                <h2>Edita un grupo</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <div class="main__options">
                <a href="./grupos.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Listar Grupo </p>
                </a>
            </div>
            <?php include("../db.php") ?>
            <?php 
                if(!isset($_GET['id_grupo'])) {
                    header("Location: ./grupos.php");
                }
                $idGrupo = $_GET['id_grupo'];
                $query = "SELECT * FROM grupo WHERE idgrupo=$idGrupo";
                $result_tasks = mysqli_query($conn, $query);
                if ($result_tasks) {
                    $row = mysqli_fetch_array($result_tasks);
                    $nivel = $row["nivel"];
                    $profesor = $row['profesor_idprofesor'];
                } else {
                    header("Location: ./grupos.php");
                }
            ?>
            <div class="content">
                <h2>Grupo <?php echo $idGrupo ?></h2>

                <h2>Edita la informacion de los estudiantes</h2>

                <?php 
                    $query = "SELECT alumno.*, alumno_grupo.calificacion as calificacion
                    FROM alumno
                    INNER JOIN alumno_grupo ON alumno.idalumno = alumno_grupo.alumno_idalumno
                    WHERE alumno_grupo.grupo_idgrupo = $idGrupo";     
                    $result = mysqli_query($conn, $query);     
                ?>
                <table class="signatures">
                    <thead>
                        <th class="sign_head"> Id Alumno </th>
                        <th class="sign_head"> Nombre</th>
                        <th class="sign_head"> Calificacion </th>
                        <th class="sign_head"> Acciones </th>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr class="sign_row">
                            <td class="sign_data"> <?php echo $row['idalumno']  ?></td>
                            <td class="sign_data"> <?php echo $row['nombre']  ?></td>
                            <td class="sign_data"> <?php echo $row['calificacion']  ?> </td>
                            <td class="sign_data">
                                <a class="btn" href="#">
                                    Editar
                                </a>
                                <a class="btn" 
                                    href="./actions/delete_alumno_grupo.php?grupo=<?php echo $idGrupo ?>&alumno=<?php echo $row['idalumno'] ?>">
                                    Eliminar
                                </a>
                                <a class="btn" href="./cuestionario.php?idalumno=<?php echo $row["idalumno"]?>&nivel=<?php echo $row["nivel"]?>">
                                    Ver cuestionario
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