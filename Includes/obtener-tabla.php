<?php
require "../Conexion/conexion.php"; 

$query = $base->query("SELECT * FROM Tarea Where IdCliente = '$idCliente' ORDER BY Fecha DESC");

?>