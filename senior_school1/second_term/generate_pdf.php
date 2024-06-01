<?php
require_once 'tcpdf/tcpdf.php';

// Create a new TCPDF instance
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Student Report');

// Set default font settings
$pdf->SetFont('helvetica', '', 11);

// Start capturing output into a buffer
ob_start();

// Include the PHP file that contains the HTML code
include 'junior1-display.php';

// Get the captured output from the buffer
$htmlContent = ob_get_clean();

// Convert HTML to PDF
$pdf->AddPage();
$pdf->writeHTML($htmlContent, true, false, true, false, '');

// Output the PDF directly to the browser
$pdf->Output('sample.pdf', 'I');
?>
