<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../Estilos/sesion.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../Images/logo.png"></head>
<body>
    <div class="container-form">
        <div class="img">
            <img src="../Images/sesion.png" alt="inicio sesion">
        </div>
        <div class="content">
            <h2>Iniciar Sesión</h2>
            <span>o <a href="registro.php">Registrate</a></span>
            <form action="../Includes/controlador-login.php" method="post">
                <label for="#">
                    <i class='bx bx-envelope'></i>
                    <input type="email" name="email" placeholder="Correo electronico" required>
                </label>
                <label for="#">
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" name="passwd" placeholder="Contraseña" required>
                </label>
                <input type="submit" value="Iniciar Sesión" name="btn-login">
            </form>
        </div>
    </div>
</body>
</html>