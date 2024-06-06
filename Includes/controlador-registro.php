<?php
require '../Conexion/conexion.php';

if(isset($_POST['btnresgistrar'])){
    $nombre = $_POST['name'];
    $apellido = $_POST['lastname'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    try {
        // Preparar la consulta SQL para insertar un nuevo registro
        $sql = "INSERT INTO Cliente (Nombre, Apellido, Email, Password) VALUES (:nombre, :apellido, :email, :passwd)";
        $stmt = $base->prepare($sql);

        // Bind de los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':passwd', $passwd);

        // Ejecutar la consulta
        $stmt->execute();

        // Redireccionar a la página de inicio de sesión después del registro exitoso
        echo '<script>
                alert("Usuario Registrado");
                window.location.href = "../Paginas/sesion.php";
            </script>';
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
