<?php
session_start();
if (!isset($_SESSION['Email'])) {
    header("location: ../Paginas/sesion.php");
    exit;
}

if (!isset($_SESSION['IdCliente'])) {
    header("location: ../Paginas/sesion.php");
    exit;
}

if (!isset($_SESSION['apellido'])) {
    header("location: ../Paginas/sesion.php");
    exit;
}

if (!isset($_SESSION['passwd'])) {
    header("location: ../Paginas/sesion.php");
    exit;
}


$nombreCliente = $_SESSION['NombreCliente'][0];
$nombre= $_SESSION['NombreCliente'];
$apellido = $_SESSION['apellido']; 
$email = $_SESSION['Email'];
$passwd = $_SESSION['passwd'];
$idCliente = $_SESSION['IdCliente'];
?>