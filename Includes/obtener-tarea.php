<?php
$idTarea = $_GET['IdTarea'];

require "../Conexion/conexion.php";

$sql = $base->prepare("SELECT * FROM Tarea WHERE IdTarea = :idTarea");
$sql->bindParam(':idTarea', $idTarea);
$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    exit('Tarea no encontrada');
}
?>
    
