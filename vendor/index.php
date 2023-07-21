<?php
require_once './autoload.php';

// Create a new PHPWord object
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./template/ReferOut.docx');
$templateProcessor->setValue('fname', 'asdasdasd');
$templateProcessor->setValue('lname', 'lastname');


$pathToSave = 'result_tumm.docx';
$templateProcessor->saveAs($pathToSave);
?>