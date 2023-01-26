<?php
require_once '../dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

if (isset($_GET['action']) && $_GET['action'] == 'download') {

  // instantiate and use the dompdf class
  $dompdf = new Dompdf();

  //to put other html file
  $html = file_get_contents('report.php');
  $html .= '<style type="text/css">.hideforpdf { display: none; }</style>';
  $dompdf->loadHtml($html);

  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('Legal', 'Landscape');

  // Render the HTML as PDF
  $dompdf->render();

  // Output the generated PDF (1 = download and 0 = preview)
  $dompdf->stream("codex",array("Attachment"=>1));
}
?>


<a class="hideforpdf" href="#" target="_blank">Download PDF</a>

