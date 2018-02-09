
<?php

    require_once 'dompdf/autoload.inc.php';

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    $id = $_GET['id'];
    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    //$dompdf->loadHtml(ob_get_clean());
    $dompdf->loadHtml(file_get_contents('../views/confirm.php'));

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('confirm.pdf');
?>
