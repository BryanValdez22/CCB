
<?php

require_once 'plantilla.php';
require '../../select.php';
$consulta = "SELECT * from vistaexcusa;";
$resultado = $mysqli->query($consulta);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(30, 10, $row['identidadid'], 1, 0, 'c', 0);
	$pdf->Cell(32, 10, $row['nombres'], 1, 0, 'c', 0);
	$pdf->Cell(33, 10, $row['apellidos'], 1, 0, 'c', 0);
	$pdf->Cell(20, 10, $row['grado'], 1, 0, 'c', 0);
	$pdf->Cell(30, 10, $row['nombrecargo'], 1, 0, 'c', 0);
	$pdf->Cell(30, 10, $row['telefono'], 1, 0, 'c', 0);
	$pdf->Cell(20, 10, $row['excusa'], 1, 1, 'c', 0);
}
$pdf->Output();
?>