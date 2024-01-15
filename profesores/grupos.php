<?php include("../db.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="../styles/table.css" />
    
    <title>AyC | Lista grupos</title>
</head>
<body>
    <div class="dashboard-container">
        <?php include("./aside.php") ?>

        <main class="main-content">
            <header class="main-header">
                <h2>Lista de grupos</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <div class="main__options">
                <a href="./grupos.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Listar Grupo </p>
                </a>
            </div>
            <div class="content">
                    <table class="signatures">
                        <thead>
                            <th class="sign_head"> Id Grupo </th>
                            <th class="sign_head"> Nivel</th>
                            <th class="sign_head"> Profesor </th>
                            <th class="sign_head"> Acciones </th>
                        </thead>
                        <tbody>
                            <?php 
                                $id = $id = $_SESSION['id'];
                                $query = "SELECT grupo.idgrupo, grupo.nivel, profesor.nombre AS nombre_profesor
                                            FROM grupo
                                            INNER JOIN profesor ON grupo.profesor_idprofesor = profesor.idprofesor
                                            WHERE grupo.profesor_idprofesor = $id";
                                $result_tasks = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result_tasks)){ ?>
                                    <tr class="sign_row">
                                        <td class="sign_data"> <?php echo $row["idgrupo"] ?> </td>
                                        <td class="sign_data"> <?php echo $row["nivel"] ?> </td>
                                        
                                        <td class="sign_data"> <?php echo $row["nombre_profesor"] ?> </td>
                                        <td class="sign_data">
                                            <a class="btn" href="./edit_grupo.php?id_grupo=<?php echo $row["idgrupo"] ?>">
                                                Editar
                                            </a>
                                            <a class="btn" href="./eliminar_grupo?id_grupo=<?php echo $row["idgrupo"] ?>">
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