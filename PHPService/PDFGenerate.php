<?php

require __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);

// Import the existing PDF
// $mpdf->SetImportUse();
$pageCount = $mpdf->SetSourceFile(__DIR__ . '/uploads/template.pdf');
// Add a new page
$mpdf->AddPage();

for ($i = 1; $i <= $pageCount; $i++) {
    // Import a page from the existing PDF
    $template = $mpdf->ImportPage($i);

    // Add the imported page to the new PDF
    $mpdf->UseTemplate($template);

    // Add an image to the new page (adjust the coordinates and size as needed)
    if ($i == 5) { // Add image only to the first page, for example
        $mpdf->Image(__DIR__ . '/signature/image.png', 15, 25, 0, 0, 'png', '', true, false);
    }

    // Add a new page to the new PDF if there are more pages in the existing PDF
    if ($i < $pageCount) {
        $mpdf->AddPage();
    }
}
// Output the new PDF
$mpdf->Output(__DIR__ . '/FinalReport/new.pdf', 'I');

/**
 * Add watermark to PDF
 */
function watermark($mpdf, $text)
{
    $mpdf->SetWatermarkText($text);
    $mpdf->showWatermarkText = true;
    $mpdf->watermark_font = 'DejaVuSansCondensed';
    $mpdf->watermarkTextAlpha = 0.1;
}