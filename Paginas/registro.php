<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../Estilos/sesion.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../Images/logo.png">
</head>
<body>
    <div class="container-form">
        <div class="img">
            <img src="../Images/registro.png" alt="inicio sesion">
        </div>
        <div class="content">
            <h2>Registrarse</h2>
            <span>o <a href="sesion.php">Inicia Sesión</a></span>
            <form action="../Includes/controlador-registro.php" method="post">
                <label for="">
                    <i class='bx bx-user'></i>
                    <input type="text" name="name" placeholder="Nombres" required>
                </label>
                <label for="">
                    <i class='bx bxs-user' ></i>
                    <input type="text" name="lastname" placeholder="Apellidos" required>
                </label>
                <label for="#">
                    <i class='bx bx-envelope'></i>
                    <input type="email" name="email" placeholder="Correo electronico" required>
                </label>
                <label for="#">
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" name="passwd" placeholder="Contraseña" required">
                </label>
                <input type="submit" value="Registrarse" name="btnresgistrar">
            </form>
        </div>
    </div>
</body>
</html>