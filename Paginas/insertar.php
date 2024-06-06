<?php require "../Includes/obtener.php" ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../Images/logo.png">
  </head>
  <body>
    <nav>
        <a href="inicio.php">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#57EBE5"><path d="m287-446.67 240 240L480-160 160-480l320-320 47 46.67-240 240h513v66.66H287Z"/></svg>
        </a>
    </nav>
    <div class="container">
        <div class="row">
            <form action="../Includes/controlador-tareas.php" method="post"> 
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Título</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Título de la tarea"
                    name="titulo">
                </div>

                <div class="mb-3">
                    <label for="">Estado</label>
                    <select name="mi_menu" class="form-select">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Realizandose">Realizandose</option>
                    <option value="Finalizado">Finalizado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción de la tarea</label>
                    <textarea class="form-control" name="des-tarea" id="exampleFormControlTextarea1" rows="3" placeholder="Descripción corta de la tarea (hasta 100 caracteres)" maxlength="100"></textarea>
                </div>
                <button type="submit" name="btninsertar" class="btn btn-primary">Crear Tarea</button>
            </form>
        </div>
        
    </div>
    
</html>