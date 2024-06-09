<?php require "../Includes/obtener.php" ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../Images/logo.png">
  </head>
  <body>
    <?php require "../Includes/obtener-tarea.php";?>
    <div class="container">
        <div class="row">
            <div class="mt-5 mb-4">
                <a href="../Paginas/inicio.php" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="#57EBE5"><path d="m287-446.67 240 240L480-160 160-480l320-320 47 46.67-240 240h513v66.66H287Z"/></svg>
                    Regresar
                </a>
            </div>
            <form action="" method="post"> 
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Título</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Título de la tarea"
                    name="titulo" value="<?= $row['Titulo']; ?>">
                </div>

                <div class="mb-3">
                    <label for="">Estado</label>
                    <select name="mi_menu" class="form-select">
                        <option value="Pendiente" <?= ($row['Estado'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="Realizandose" <?= ($row['Estado'] == 'Realizandose') ? 'selected' : ''; ?>>Realizandose</option>
                        <option value="Finalizado" <?= ($row['Estado'] == 'Finalizado') ? 'selected' : ''; ?>>Finalizado</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción de la tarea</label>
                    <textarea class="form-control" name="des-tarea" id="exampleFormControlTextarea1" rows="3" placeholder="Descripción corta de la tarea (hasta 100 caracteres)" maxlength="100"><?= $row['Descripcion']; ?></textarea>
                </div>
                <button type="submit" name="btneditar" class="btn btn-primary">Editar Tarea</button>
            </form>
        </div>
        
    </div>
    
    <?php
    $idTarea = $_GET['IdTarea'];

    require "../Conexion/conexion.php";

    if(isset($_POST['btneditar'])){
        $titulo = $_POST['titulo'];
        $estado = $_POST['mi_menu'];
        $descripcion = $_POST['des-tarea'];

        if(!empty($titulo) && !empty($descripcion)){
            $sql = $base->prepare("UPDATE Tarea SET Titulo = :titulo, Estado = :estado, Descripcion = :descripcion WHERE IdTarea = :idtarea");
        
            $sql->bindParam(':titulo', $titulo);
            $sql->bindParam(':estado', $estado);
            $sql->bindParam(':descripcion', $descripcion);
            $sql->bindParam(':idtarea', $idTarea);

            if (!$sql->execute()) {
                $errorInfo = $sql->errorInfo();
                echo "Error: " . $errorInfo[2];
            }
            

            echo '<script>
                    alert("Tarea Editada");
                    window.location.href = "../Paginas/inicio.php";
                </script>';
            exit();
        }else{
            echo '
                <script>
                    alert("Campos vacíos")
                    window.location.href = "../Paginas/inicio.php";
                </script>
            ';
        }
    }
    ?>
    
</html>