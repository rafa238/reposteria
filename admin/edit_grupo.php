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
            </ul>
        </aside>

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
                <a href="./agregar_grupo.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Agregar Grupo </p>
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
                <h2>Edita la informacion del grupo <?php echo $idGrupo ?></h2>
                <form action="./actions/save_grupo.php" class="forms" method="POST">
                    <input type="hidden" name="grupo" value="<?php echo $idGrupo ?>" />
                    <div class="forms__group">
                        <label for="nivel">Ingresa el nivel:</label>
                        <input type="text" value="<?php echo $nivel ?>" id="nivel" name="nivel" class="field" required>     
                    </div>
                    <div class="forms__group">
                        <label for="profesor">Profesor:</label>
                        <select id="profesor" name="profesor">
                        <?php 
                            $query ="SELECT * FROM profesor";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result)){ ?>
                                <option 
                                    value="<?php echo $row["idprofesor"] ?>"
                                    <?php 
                                        if ($row["idprofesor"] == $profesor) {
                                            echo "selected";
                                        } 
                                    ?> >
                                    <?php echo $row["nombre"] ?>
                                </option>
                        <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="update_grupo" class="btn">Agregar grupo</button>
                </form>

                <h2>Edita la informacion de los estudiantes</h2>
                <form action="./actions/save_alumno.php" method="POST" class="forms">
                    <h3>Agregar un alumno</h3>
                    <div class="forms__group">
                        <input type="hidden" name="grupo" value="<?php echo $idGrupo ?>" />
                        <label for="alumno">Alumno:</label>
                        <select id="alumno" name="alumno">
                            <?php 
                                $query ="SELECT * FROM alumno";
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result)){ 
                                    if($row["nivel"] != $nivel) {
                                        continue;
                                    }   
                                ?>
                                    <option 
                                        value="<?php echo $row["idalumno"] ?>">
                                        <?php echo $row["nombre"] ?>
                                    </option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="add_alumno" class="btn">Agregar al grupo</button>
                </form>

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
                                <a class="btn" href="#">
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