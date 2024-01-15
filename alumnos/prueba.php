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
    <title>AyC | Agregar grupo</title>
</head>
<body>
    <div class="dashboard-container">
        <?php include("aside.php") ?>
        <main class="main-content">
            <header class="main-header">
                <h2>Examen de aprobacion</h2>
                <img src="../logo.png" alt="Logo Pastelería">
            </header>
            <div class="main__options">
                <a href="./grupos.php">
                    <img src="../images/icons/boton-agregar.png" />
                    <p> Inscripcion </p>
                </a>
            </div>
            <div class="content">
                <?php 
                include("../db.php"); 
                $id = $_GET["id"];
                ?>
                <form action="./respuestas.php" method="POST" class="forms">
                <input type="hidden" value="<?php echo $id ?>" name="idalumno" />
                    <?php 
                    $nivel = $_GET["nivel"];
                    
                    $query ="SELECT * FROM pregunta WHERE pregunta.nivel = $nivel";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)){ ?>
                        
                        <div class="forms__group">
                            <label for="respuesta_<?php echo $row["idpregunta"]; ?>">
                                <?php echo $row["pregunta"]; ?>
                            </label>
                            <input type="text" 
                                id="respuesta_<?php echo $row["idpregunta"]; ?>" 
                                name="respuestas[<?php echo $row["idpregunta"]; ?>]" 
                                class="field" required>     
                        </div>
                        
                    <?php } ?>
                    <button type="submit" value="save_prueba" name="save_prueba" class="btn">Agregar respuestas</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>