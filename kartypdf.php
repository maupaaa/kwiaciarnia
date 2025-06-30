<?php
require('fpdf.php');

$imagePath = 'evie-s-bSVGnUCk4tk-unsplash.jpg';

list($width, $height) = getimagesize($imagePath);

$widthInMM = $width * 25.4 / 96;
$heightInMM = $height * 25.4 / 96;

$pdf = new FPDF('L', 'mm', array($widthInMM, $heightInMM));
$pdf->AddPage();

$pdf->Image($imagePath, 0, 0, $widthInMM, $heightInMM);

$conn = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$last_id_result = mysqli_query($conn, "SELECT MAX(id) AS last_id FROM karty");
$last_id_row = mysqli_fetch_assoc($last_id_result);
$last_id = $last_id_row['last_id'];

$result = mysqli_query($conn, "SELECT nadawca, odbiorca, kwota FROM karty WHERE id = $last_id");
$row = mysqli_fetch_assoc($result);

$nadawca = $row['nadawca'];
$odbiorca = $row['odbiorca'];
$kwota = $row['kwota'];

$pdf->SetTextColor(147,70,84);

$text_nadawca = "Od: " . $nadawca;
$text_odbiorca = "Dla: " . $odbiorca;
$text = "Karta podarunkowa do kwiaciarni";
$textpod = "Wartosc: " . $kwota . " pln";
$waznosc = "Karta wazna jest do " . date('d/m/Y', strtotime('+1 year'))." roku.";
$centerX = $widthInMM / 2;
$centerY = $heightInMM / 2;

$pdf->SetFont('Helvetica', 'B', 150);
$textWidth = $pdf->GetStringWidth($text);
$pdf->SetXY($centerX - ($textWidth / 2), $centerY - 20);
$pdf->Cell($textWidth, 10, $text, 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 80);
$textWidthPod = $pdf->GetStringWidth($textpod);
$pdf->SetXY($centerX - ($textWidthPod / 2), $centerY + 30);
$pdf->Cell($textWidthPod, 10, $textpod, 0, 1, 'C');

$pdf->SetXY($centerX - ($textWidthPod / 2), $centerY + 65);
$pdf->Cell($textWidthPod, 10, $waznosc, 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 80);
$pdf->SetXY(10, $heightInMM - 100);
$pdf->Cell(0, 10, $text_nadawca, 0, 1, 'L');

$pdf->SetXY(10, $heightInMM - 60);
$pdf->Cell(0, 10, $text_odbiorca, 0, 1, 'L');

$pdf->Output();

mysqli_close($conn);
?>
