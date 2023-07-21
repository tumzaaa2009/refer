<?php
require_once '../../vendor/autoload.php';
function convertListDrugsToString($data)
{
    $result = '';

    foreach ($data as $group) {
        $result .= "วันที่จ่ายยา: " . $group[0]['date'] ;
        foreach ($group as $item) {
            $result .= "ชื่อยา: " . $item['drugname'] ;
            $result .= "Therapeutic: " . $item['therapeutic'] ;
            $result .= "Unit: " . $item['unit'] ;
        
        }
    }

    return $result;
}

//   print_r($_POST);
use PhpOffice\PhpWord\IOFactory;

// Create a new PHPWord object
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../../vendor/template/ReferOut.docx');
$templateProcessor->setValue('ref_no', $_POST['refer_no']);
$templateProcessor->setValue('referdate', $_POST['refer_time']);
$templateProcessor->setValue('cid', $_POST['cid']);
$templateProcessor->setValue('referCode',$_POST['refer_code'].'->'.$_POST['refer_name']);
$templateProcessor->setValue('referhospcode', $_POST['codeReferDes'].'->'.$_POST['hosReferDes']);
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
$templateProcessor->setValue('listDrugs', convertListDrugsToString(json_decode($_POST['listDrugs'], true)));

 

 
 
// // Set up the HTTP headers for download
// header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
// header('Content-Disposition: attachment; filename="'. $_POST['refer_no'].'.docx"');

// Save the document directly to the output stream (no need to store on server)
// $templateProcessor->saveAs('php://output');

// Load the tempfile using IOFactory
$tempFilePath = tempnam(sys_get_temp_dir(), 'phpword.docx');
$templateProcessor->saveAs($tempFilePath);
$phpWord = \PhpOffice\PhpWord\IOFactory::load($tempFilePath);

// Convert $phpWord to HTML using PhpWord's Writer
$writer = new \PhpOffice\PhpWord\Writer\HTML($phpWord);
$html = $writer->getContent();
 echo $html;
?>