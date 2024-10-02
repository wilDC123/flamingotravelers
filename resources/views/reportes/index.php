<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('flamingo_logo.png',10,8,20);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(50);
        // Título con borde alrededor
        $this->SetDrawColor(50,50,100); // Color del borde
        $this->Cell(120,10, utf8_decode('Reporte de Reservas'));
        // Salto de línea
        $this->Ln(20);
        
        // Colores, ancho de línea y fuente en negrita para el encabezado de la tabla
        $this->SetFillColor(200,200,255); // Color de fondo
        $this->SetTextColor(0); // Color del texto
        $this->SetFont('Arial','B',12);
        
        // Encabezado de la tabla
        $this->Cell(10,10,'ID',1,0,'C', true);
        $this->Cell(45,10,'Cliente ID',1,0,'C', true);
        $this->Cell(30,10,'Inicio',1,0,'C', true);
        $this->Cell(30,10,'Fin',1,0,'C', true);
        $this->Cell(25,10,'Personas',1,0,'C', true);
        $this->Cell(25,10,'Estado',1,0,'C', true);
        $this->Cell(25,10,'Destino ID',1,0,'C', true);
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Línea encima del pie de página
        $this->SetDrawColor(0,0,0);
        $this->Line(10,$this->GetY(),200,$this->GetY()); 
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

require 'cn.php';
$consulta = "SELECT * FROM reservations";
$resultado = $mysqli -> query($consulta);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row = $resultado -> fetch_assoc()){
    // Contenido de la tabla
    $pdf->Cell(10,10,$row['id'],1,0,'C');
    $pdf->Cell(45,10,$row['client_id'],1,0,'C');
    $pdf->Cell(30,10,$row['start_date'],1,0,'C');
    $pdf->Cell(30,10,$row['end_date'],1,0,'C');
    $pdf->Cell(25,10,$row['number_people'],1,0,'C');
    $pdf->Cell(25,10,utf8_decode($row['status']),1,0,'C');
    $pdf->Cell(25,10,$row['destination_id'],1,1,'C');
}

$pdf->Output();
?>
