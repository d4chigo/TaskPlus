<?php require "../Includes/obtener.php"; ?>

<head>
    <title>Task-Perfil</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../Images/logo.png">
</head>
<body class="container">
    <div class="mt-5 mb-4">
        <a href="../Paginas/inicio.php" class="btn btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="#57EBE5"><path d="m287-446.67 240 240L480-160 160-480l320-320 47 46.67-240 240h513v66.66H287Z"/></svg>
            Regresar
        </a>
    </div>
    <h1 class="mt-5">Perfil de Usuario</h1>
    <form action="" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $apellido; ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>">
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña:</label>
            <input type="text" id="contrasena" name="contrasena" class="form-control" value="<?php echo $passwd; ?>">
        </div>

        <button type="submit" name="btnguardar" class="btn btn-primary">Guardar</button>
    </form>

    <?php
    require "../Includes/obtener.php";

    require "../Conexion/conexion.php";

    if(isset($_POST['btnguardar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        if(!empty($nombre) && !empty($apellido) && !empty($email) && !empty($contrasena)){
            $sql = $base->prepare("UPDATE Cliente SET Nombre = :nombre, Apellido = :apellido, Email = :email, Password = :passwd WHERE IdCliente = :idcliente");
        
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':apellido', $apellido);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':passwd', $contrasena);
            $sql->bindParam(':idcliente', $idCliente);

            if (!$sql->execute()) {
                $errorInfo = $sql->errorInfo();
                echo "Error: " . $errorInfo[2];
            }
            

            echo '<script>
                    alert("Usuario Editado");
                    window.location.href = "../Includes/cerrar-sesion.php";
                </script>';
            exit();
        }else{
            echo '
                <script>
                    alert("Campos vacíos")
                    window.location.href = "../Paginas/editar-perfil.php";
                </script>
            ';
        }

        
    }
    ?>

</body>
