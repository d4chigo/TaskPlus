<?php 
session_start();
require_once "../Conexion/conexion.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-login'])) {
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];

    $sql = "SELECT * FROM Cliente WHERE Email = :email AND Password = :passwd";
    $stmt = $base->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':passwd', $passwd);

    try {
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($datos) {
            $_SESSION['Email'] = $datos['Email'];
            $_SESSION['NombreCliente'] = $datos['Nombre'];
            $_SESSION['apellido'] = $datos['Apellido'];
            $_SESSION['passwd'] = $datos['Password'];
            $_SESSION['IdCliente'] = $datos['IdCliente'];
            header("location: ../Paginas/inicio.php");
            exit;
        } else {
            echo '<script>
                alert("Acceso denegado");
                window.location.href = "../Paginas/sesion.php";
            </script>';
        }
    } catch (PDOException $e) {
        $error = "Error en la consulta: " . $e->getMessage();
    }
}
?>