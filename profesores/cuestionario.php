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
        <?php include("./aside.php") ?>

        <main class="main-content">
            <header class="main-header">
                <h2>Cuestionario</h2>
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
                            <th class="sign_head"> Id Alumno </th>
                            <th class="sign_head"> Pregunta </th>
                            <th class="sign_head"> Respuesta </th>
                        </thead>
                    <tbody>
                    <?php
                        include("../db.php");  
                        $nivel = $_GET["nivel"];
                        $id = $_GET["idalumno"];
                        $query ="
                            SELECT pregunta.idpregunta, pregunta.pregunta, cuestionario.respuesta
                            FROM alumno
                            JOIN cuestionario ON alumno.idalumno = cuestionario.idalumno
                            JOIN pregunta ON cuestionario.idpregunta = pregunta.idpregunta
                            WHERE alumno.idalumno = $id
                            AND pregunta.nivel = $nivel;
                        ";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result)){ ?>
                        <tr class="sign_row">
                            <td class="sign_data"> <?php echo $row['idpregunta']  ?></td>
                            <td class="sign_data"> <?php echo $row['pregunta']  ?></td>
                            <td class="sign_data"> <?php echo $row['respuesta']  ?> </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>