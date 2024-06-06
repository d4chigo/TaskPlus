<?php require "../Includes/obtener.php" ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="icon" href="../Images/logo.png">
    <link rel="stylesheet" href="../Estilos/inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav>
        <h1 class="titulo">TaskPlus</h1>
        <ul class="lul">
            <li class="dropdown">
                <span tabindex="0" class="n-u" id="dropdown-toggle"><?php echo $nombreCliente; ?></span>
                <ul class="ul-second" id="dropdown-menu">
                    <li><a href="editar-perfil.php">Mi Perfil</a></li>
                    <li><a href="../Includes/cerrar-sesion.php">Cerrar Sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!--Tabla-->

    <div class="container">
        <div class="row">
            <div class="botones">
                <div class="agregar">
                    <a href="insertar.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#57ebe5"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                        Agregar Tarea
                    </a>
                </div>

                <div class="agregar">
                    <a href="../Includes/generar-pdf.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#58ede5"><path d="M652-645.33v-128H308v128h-66.67V-840h477.34v194.67H652Zm-505.33 66.66h666.66-666.66Zm586 96.67q13.66 0 23.5-9.83 9.83-9.84 9.83-23.5 0-13.67-9.83-23.5-9.84-9.84-23.5-9.84-13.67 0-23.5 9.84-9.84 9.83-9.84 23.5 0 13.66 9.84 23.5Q719-482 732.67-482ZM652-186.67V-368H308v181.33h344ZM718.67-120H241.33v-170.67H80v-244q0-47.03 32-78.85 32-31.81 78.67-31.81h578.66q47.04 0 78.85 31.81Q880-581.7 880-534.67v244H718.67V-120Zm94.66-237.33v-177.48q0-18.86-12.65-31.36t-31.35-12.5H190.67q-18.7 0-31.35 12.65-12.65 12.65-12.65 31.35v177.34h94.66v-77.34h477.34v77.34h94.66Z"/></svg>
                    </a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha - Hora</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require "../Includes/obtener-tabla.php";

                        foreach($resultados as $key => $value){
                    ?>
                    <tr>
                    <td><?=$value['Titulo']; ?></td>
                    <td><?=$value['Descripcion']; ?></td>
                    <td><?=$value['Fecha']; ?></td>
                    <td><?=$value['Estado']; ?></td>
                    <td>
                        <a href="editar-tarea.php?IdTarea=<?= $value['IdTarea']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="40px" fill="#0ECBC4"><path d="M186.67-186.67H235L680-631l-48.33-48.33-445 444.33v48.33ZM120-120v-142l559.33-558.33q9.34-9 21.5-14 12.17-5 25.5-5 12.67 0 25 5 12.34 5 22 14.33L821-772q10 9.67 14.5 22t4.5 24.67q0 12.66-4.83 25.16-4.84 12.5-14.17 21.84L262-120H120Zm652.67-606-46-46 46 46Zm-117 71-24-24.33L680-631l-24.33-24Z"/></svg>
                        </a>
                        <a href="../Includes/eliminar.php?IdTarea=<?= $value['IdTarea']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="30px" fill="#235BD3"><path d="M267.33-120q-27.5 0-47.08-19.58-19.58-19.59-19.58-47.09V-740H160v-66.67h192V-840h256v33.33h192V-740h-40.67v553.33q0 27-19.83 46.84Q719.67-120 692.67-120H267.33Zm425.34-620H267.33v553.33h425.34V-740Zm-328 469.33h66.66v-386h-66.66v386Zm164 0h66.66v-386h-66.66v386ZM267.33-740v553.33V-740Z"/></svg>
                        </a>
                    </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

</body> 
</html>
