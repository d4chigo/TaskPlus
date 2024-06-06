<?php 
    require "../Conexion/conexion.php";

    $id = $_GET['IdTarea'];

    $eliminar = $base->query("DELETE FROM Tarea WHERE IdTarea = '$id'");

    header("Location: ../Paginas/inicio.php");
?>