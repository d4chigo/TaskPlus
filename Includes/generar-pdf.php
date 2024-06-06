<?php
// Incluir la biblioteca TCPDF
require_once('../tcpdf/tcpdf.php');

// Obtener los resultados de la consulta
$resultados = require "../Includes/obtener-tabla.php";


// Crear una nueva instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer el título del documento
$pdf->SetTitle('Lista de Tareas');

// Establecer el encabezado y el pie de página
$pdf->SetHeaderData('', 0, 'TaskPlus', '');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Establecer márgenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Establecer autoajuste del contenido
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Establecer el espacio entre líneas
$pdf->setCellHeightRatio(1.5);

// Agregar una página
$pdf->AddPage();

// Definir el contenido del PDF
$html = '<h1>Lista de Tareas</h1>';
$html .= '<table border="1">
            <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Fecha - Hora</th>
                <th>Estado</th>
            </tr>';
// Iterar sobre los resultados y agregar filas a la tabla
foreach ($resultados as $key => $value) {
    $html .= '<tr>';
    $html .= '<td>' . $value['Titulo']. '</td>';
    $html .= '<td>' . $value['Descripcion'] . '</td>';
    $html .= '<td>' . $value['Fecha'] . '</td>';
    $html .= '<td>' . $value['Estado'] . '</td>';
    $html .= '</tr>';
}

$html .= '</table>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y generar el PDF
$pdf->Output('Lista_de_Tareas.pdf', 'I');
?>
