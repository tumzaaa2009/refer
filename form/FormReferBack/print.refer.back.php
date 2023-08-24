<?php
require_once '../../vendor/autoload.php';
function convertListDrugsToString($data)
{
    $result = '';
    if (is_array($data) && !empty($data)) {
        foreach ($data as $group) {
            $result .= "วันที่จ่ายยา: " . $group[0]['date'];
            foreach ($group as $item) {
                $result .= "ชื่อยา: " . $item['drugname'];
                $result .= "Therapeutic: " . $item['therapeutic'];
                $result .= "Unit: " . $item['unit'];
            }


            return $result;
        }
    }
}
function convertListLabsToString($data)
{
    $result = '';

    if (is_array($data) && !empty($data)) {
        foreach ($data as $group) {
            // เริ่มต้นด้วยข้อความในกลุ่มนั้นๆ (เวลา/วันที่จ่ายยา)
            $result .= "วันที่ตรวจทางห้องปฏิบัติการ: " . $group[0]->date . "\n";

            // วน loop เพื่อรับค่า 'lab_items_name', 'lab_items_normal_value', และ 'lab_order_result' ในแต่ละรายการ
            foreach ($group as $item) {
                $result .= "ชื่อแลปที่ตรวจ: " . $item->lab_items_name . "\n";
                $result .= "ค่าปกติ: " . ($item->lab_items_normal_value ?? "ไม่ระบุ") . "\n";
                $result .= "ผลการตรวจ: " . $item->lab_order_result . "\n";
            }

            // เพิ่มข้อความเพิ่มเติมหลังจากแต่ละกลุ่ม (ถ้าต้องการ)
            // $result .= "ข้อความเพิ่มเติม\n";

            // เพิ่มเว้นบรรทัดหลังแต่ละกลุ่ม (ถ้าต้องการ)
            $result .= "\n";
        }
    }

    return $result;
}


function riskTruma($data)
{
    if (isset($data)) {
        if (is_array($data) && !empty($data)) {
            // สร้างตัวแปรสำหรับเก็บข้อความที่คืนค่าในรูปแบบ HTML
            $htmlOutput = '';

            foreach ($data as $item) {
                // ดึงค่าในแต่ละ element
                $id = $item['id'] + 1;
                $time = $item['time'];
                $consciousness = $item['Consciousness'];
                $e = $item['e'];
                $v = $item['v'];
                $m = $item['m'];
                $pupilR = $item['pupilR'];
                $pupilL = $item['pupilL'];
                $Tc = $item['Tc'];
                $prF = $item['prF'];
                $pfM = $item['pfM'];
                $bp = $item['bp'];
                $mmHg = $item['mmHg'];
                $spo2 = $item['spo2'];

                // สร้าง HTML string ของแต่ละ element
                $htmlOutput .= "ครั้งที่: " . $id . ",";
                $htmlOutput .= "Time: " . $time . ",";
                $htmlOutput .= "Consciousness: " . $consciousness . ",";
                $htmlOutput .= "E: " . $e . ",";
                $htmlOutput .= "V: " . $v . ",";
                $htmlOutput .= "M: " . $m . ",";
                $htmlOutput .= "Pupil R: " . $pupilR . ",";
                $htmlOutput .= "Pupil L: " . $pupilL . ",";
                $htmlOutput .= "Tc: " . $Tc . ",";
                $htmlOutput .= "PrF: " . $prF . ",";
                $htmlOutput .= "PfM: " . $pfM . ",";
                $htmlOutput .= "BP: " . $bp . ",";
                $htmlOutput .= "mmHg: " . $mmHg . ",";
                $htmlOutput .= "SpO2: " . $spo2 . "";
            }

            // คืนค่าเป็น HTML string ที่ประกอบด้วยข้อความที่ผู้ใช้งานสามารถอ่านได้
            return $htmlOutput;
        }
    }
}

//   print_r($_POST);
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Element\PageBreak;
// Create a new PHPWord object
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../../vendor/template/ReferBack.docx');
$templateProcessor->setValue('ref_no', $_POST['refer_no']);
$templateProcessor->setValue('referdate', $_POST['refer_time']);
$templateProcessor->setValue('cid', $_POST['cid']);
$templateProcessor->setValue('referCode', $_POST['refer_code'] . '->' . $_POST['refer_name']);
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
$templateProcessor->setValue('finalDianosis', $_POST['finalDianosis']);
$templateProcessor->setValue('listDrugs', convertListDrugsToString(json_decode($_POST['listDrugs'], true)));
$templateProcessor->setValue('riskTruma', riskTruma(json_decode($_POST['detailRiskTurmar'], true)));
$templateProcessor->setValue('progressNote', $_POST['progressNote'] );
$templateProcessor->setValue('lab', convertListLabsToString(json_decode($_POST['detailLabs'])));
$templateProcessor->setValue('icd10Detail', $_POST['icd10Detail']);
$templateProcessor->setValue('resonFromReferback', $_POST['reasonFormReferback']);
$templateProcessor->setValue('refReciveReferbackOther', $_POST['reasonFormReferbackOther']);
$templateProcessor->setValue('pttype', $_POST['pttype']);
$templateProcessor->setValue('signName', $_POST['doctorNameDes']);
$templateProcessor->setValue('referTime', $_POST['refer_time']);


 
 header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
  header('Content-Disposition: attachment; filename="' . $_POST['refer_no'] . '.docx"');

// Save the document directly to the output stream (no need to store on server)
  $templateProcessor->saveAs('php://output');

//Load the tempfile using IOFactory
// $tempFilePath = tempnam(sys_get_temp_dir(), 'phpword.docx');
// $templateProcessor->saveAs($tempFilePath);
// $phpWord = \PhpOffice\PhpWord\IOFactory::load($tempFilePath);

// Convert $phpWord to HTML using PhpWord's Writer
// $writer = new \PhpOffice\PhpWord\Writer\HTML($phpWord);
// $html = $writer->getContent();
//  echo $html;
 