<?php
require_once ("../vendor/autoload.php");
require_once ("../modelo/Pdf.php");
$id_venta = $_POST['id'];
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf = new Dompdf($options);

$plantilla=getHtml($id_venta);
$dompdf->loadHtml($plantilla);
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();
$contenido = $dompdf->output();
$nombreDelDocumento = "../pdf/pdf-".$id_venta.".pdf";
$bytes = file_put_contents($nombreDelDocumento, $contenido); 
