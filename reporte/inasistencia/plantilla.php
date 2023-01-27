<?php

require('../fpdf/fpdf.php');


class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../../img/berthasuttner1.jpg', 10, 8, 33);
        // Arial bold 15
        $this->SetFont('Times', 'B', 18);
        // Movernos a la derecha
        $this->Cell(34);
        // Título
        $this->Cell(120, 24, 'Reporte General De Inasistencia', 0, 0, 'C');
        // Salto de línea
        $this->Ln(30);
        $this->Cell(30, 10, 'Identidad', 1, 0, 'c', 0);
        $this->Cell(32, 10, 'Nombres', 1, 0, 'c', 0);
        $this->Cell(33, 10, 'Apellidos', 1, 0, 'c', 0);
        $this->Cell(20, 10, 'Grado', 1, 0, 'c', 0);
        $this->Cell(30, 10, 'Cargo', 1, 0, 'c', 0);
        $this->Cell(30, 10, 'Telefono', 1, 0, 'c', 0);
        $this->Cell(20, 10, 'Faltas', 1, 1, 'c', 0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
