<?php
require "../Conexion/conexion.php"; 

$query = $base->query("SELECT * FROM Tarea Where IdCliente = '$idCliente' ORDER BY Fecha DESC");

$resultados = array();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $resultados[] = $row;
}

return $resultados;

?>