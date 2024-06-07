<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('../Images/logo.png', 65, 10, 10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Listado de Tareas - TaskPlus', 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Crear nuevo PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Conectar a la base de datos y obtener los datos
require_once '../Conexion/conexion.php';
include ('obtener.php');

$query = $base->query("SELECT * FROM Tarea WHERE IdCliente = '$idCliente' ORDER BY Fecha DESC");

// Agregar encabezados de la tabla
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(40, 10, 'Titulo', 1, 0, 'C', true);
$pdf->Cell(80, 10, utf8_decode('Descripción'), 1, 0, 'C', true);
$pdf->Cell(45, 10, 'Fecha - Hora', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Estado', 1, 1, 'C', true);



// Agregar datos de la tabla
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(40, 10, utf8_decode($row['Titulo']), 1);
    $pdf->Cell(80, 10, utf8_decode($row['Descripcion']), 1);
    $pdf->Cell(45, 10, $row['Fecha'], 1, 0, 'C'); 
    $pdf->Cell(30, 10, utf8_decode($row['Estado']), 1, 1, 'C'); 
}

// Salida del PDF
$pdf->Output('I', 'tareas.pdf');
?>
