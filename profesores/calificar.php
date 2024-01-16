<?php include("../db.php") ?>
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
            <?php 
                $name = "";
                $email = "";
                $idAlumno = "";
                $calificacion = "";
                
                $idAlumno = $_GET['idalumno'];
                //$idGrupo = $_GET['idgrupo'];
                $query = " SELECT alumno.idalumno, alumno.nombre, alumno.nivel, alumno.correo, alumno_grupo.calificacion 
                FROM alumno
                INNER JOIN alumno_grupo ON alumno.idalumno = alumno_grupo.alumno_idalumno
                WHERE alumno.idalumno = $idAlumno";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $idAlumno = $row['idalumno'];
                $name = $row['nombre'];
                $email = $row['correo'];
                $nivel = $row['nivel'];
                $calificacion = $row['calificacion'];
            ?>
            <div class="content">
                <form action="./actions/update_alumno.php" class="forms" method="POST">
                    <input type="hidden" value="<?php echo $idAlumno ?>" name="idalumno" />
                    <div class="forms__group">
                        <label for="username">Nombre:</label>
                        <input type="text" id="username" name="name" class="field" required
                        value="<?php echo $name?>" disabled>     
                    </div>
                    <div class="forms__group">
                        <label for="email">Correo:</label>
                        <input type="email" id="email" name="email" class="field" required
                            value="<?php echo $email ?>" disabled>     
                    </div>
                    <div class="forms__group">
                        <label for="nivel">Nivel:</label>
                        <input type="text" id="nivel" name="nivel" class="field" required
                        value="<?php echo $nivel ?>" disabled>     
                    </div>
                    
                    <div class="forms__group">
                        <label for="cali">Ingresa la calificacion:</label>
                        <input type="text" id="cali" name="calificacion" class="field" required
                        value="<?php echo $calificacion ?>">     
                    </div>
                    <button type="submit" name="edit_alumno" class="btn">Enviar</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>