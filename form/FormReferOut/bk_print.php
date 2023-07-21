<?php
require_once '../../vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Language;
use PhpOffice\PhpWord\Settings;



// Set the path to TCPDF (make sure to replace 'path/to/tcpdf' with the actual path)
Settings::setPdfRendererPath('path/to/tcpdf');
Settings::setPdfRendererName('TCPDF');

// Create a new PHPWord object and set values
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../../vendor/template/ReferOut.docx');
$templateProcessor->setValue('ref_no', $_POST['refer_no']);

$templateProcessor->setValue('referdate', $_POST['refer_time']);
$templateProcessor->setValue('cid', $_POST['cid']);
$templateProcessor->setValue('referCode', $_POST['refer_code'] . '->' . $_POST['refer_name']);
$templateProcessor->setValue('referhospcode', $_POST['codeReferDes'] . '->' . $_POST['hosReferDes']);
$templateProcessor->setValue('des', $_POST['getStationService']);
$templateProcessor->setValue('pname', $_POST['pname']);
$templateProcessor->setValue('fname', $_POST['fname']);
$templateProcessor->setValue('lname', $_POST['lname']);
$templateProcessor->setValue('gender', $_POST['gender']);
$templateProcessor->setValue('age', $_POST['age']);
$templateProcessor->setValue('addr', $_POST['addr']);
$templateProcessor->setValue('moopart', $_POST['moopart']);
$templateProcessor->setValue('tmbpart', $_POST['tmbpart']);
$templateProcessor->setValue('amppart', $_POST['amppart']);
$templateProcessor->setValue('chwpart', $_POST['chwpart']);
$templateProcessor->setValue('aligy', $_POST['aligy']);
$templateProcessor->setValue('cc', $_POST['cc']);

// ... (set other values here)

// Generate the tempfile
$tempFilePath = tempnam(sys_get_temp_dir(), 'phpword.docx');
  $templateProcessor->saveAs($tempFilePath);

// Load the tempfile using IOFactory
$phpWord = \PhpOffice\PhpWord\IOFactory::load($tempFilePath);

// Convert $phpWord to HTML using PhpWord's Writer
$writer = new \PhpOffice\PhpWord\Writer\HTML($phpWord);
$html = $writer->getContent();


$fontFace = '<style>
    @font-face {
        font-family: "TH Sarabun New";
        src: url("https://fonts.googleapis.com/css2?family=TH+Sarabun+New&display=swap");
    }
</style>';
$html = $fontFace . $html;

// Use mPDF to generate PDF with TH Sarabun New font
use \Mpdf\Mpdf;

$mpdf = new Mpdf();
$mpdf->autoScriptToLang = true;
$mpdf->autoLangToFont = true;
$mpdf->SetDefaultFont('THSarabunNew');
$mpdf->WriteHTML($html);
$filename = $_POST['refer_no'] . '.pdf';

// Output the PDF to the browser with the appropriate headers
$mpdf->Output($filename, 'D'); // D to force download, or use 'I' to display in the browser

unlink($tempFilePath);
