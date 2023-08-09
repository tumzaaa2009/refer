<?php 
include('../file.refer.connec.php');
$serverHis;
$userHis;
$passHis;
$dbNameHis;
$objconnectHis;
$portHis;
function conDBdw()
{
    global $serverHis;
    global $userHis;
    global $passHis;
    global $dbNameHis;
    global $objconnectHis;
    global $portHis;
    $objconnectRefer = pg_connect("host=$serverHis port=$portHis dbname=$dbNameHis user=$userHis password=$passHis");

    if (!$objconnectRefer) {
        echo "Failed to connect : " . mysqli_connect_error();
        exit();
    } else {
        pg_set_client_encoding($objconnectRefer, "utf8");
        $rsStation = array('status' => true, 'response' => 'connectSuscess');
    }
}

conDBdw();


// // ? บุคคล
function InputHn()
{
    global $serverHis;
    global $userHis;
    global $passHis;
    global $dbNameHis;
    global $objconnectHis;
    global $portHis;
    $whereCid = '';
    $whereHn = '';
    $personDurgallergy = array();
    $labs=array();
    if (isset($_POST['hn'])) {
        $whereHn = "hn = '" . $_POST['hn'] . "'";
    }
    if (isset($_POST['cid'])) {
        $whereCid = "cid = '" . $_POST['cid'] . "'";
    }
    $selectHn = "SELECT * FROM patient WHERE $whereHn  $whereCid ";
    $queryHn = pg_query(pg_connect("host=$serverHis port=$portHis dbname=$dbNameHis user=$userHis password=$passHis"), $selectHn);
    $fetchHn = pg_fetch_array($queryHn);
    $countHn = pg_num_rows($queryHn);
    if ($countHn > 0) {
        // แพ้ยา
        $selectDurgallergy = "SELECT * FROM opd_allergy WHERE hn= '" . $fetchHn['hn'] . "'   ";
        $queryDurgallergy = pg_query(pg_connect("host=$serverHis port=$portHis dbname=$dbNameHis user=$userHis password=$passHis"), $selectDurgallergy);
        while ($fetchDurgallergy = pg_fetch_array($queryDurgallergy)) {
            array_push($personDurgallergy, $fetchDurgallergy['agent'] . '(' . $fetchDurgallergy['symptom'] . ')');
        }


        $rsHn = array('status' => 200, 'Person' => array('hn' => $fetchHn['hn'], 'cid' => $fetchHn['cid'], 'pname' => $fetchHn['pname'], 'fname' => $fetchHn['fname'], 'lname' => $fetchHn['lname'], 'birthday' => $fetchHn['birthday'], 'sex' => $fetchHn['sex'], 'allergy' => $personDurgallergy,  'addr' => $fetchHn['addrpart'], 'moopart' => '0' . $fetchHn['moopart'], 'tmbpart' => $fetchHn['tmbpart'], 'amppart' => $fetchHn['amppart'], 'chwpart' => $fetchHn['chwpart']));

        $addressfull = $rsHn['Person']['chwpart'] . $rsHn['Person']['amppart'] . $rsHn['Person']['tmbpart'];
        $addressSub =  $rsHn['Person']['chwpart'] . $rsHn['Person']['amppart'] . $rsHn['Person']['tmbpart'] . $rsHn['Person']['moopart'];
        $selctFullAddress = "SELECT full_name FROM thaiaddress WHERE addressid ='" . $addressfull . "'";
        $queryFullAddress = mysqli_query($objconnectHis, $selctFullAddress);
        $fetchQueryAddress = mysqli_fetch_array($queryFullAddress);
        $arrFetchAddress = explode(" ", $fetchQueryAddress['full_name']);
        $selectSubAddress = "SELECT area_name FROM thaiaddress_sub_hcode WHERE address_id='" . $addressSub . "'";
        $querySubAddress = mysqli_query($objconnectHis, $selectSubAddress);
        $fetchSubAddress = mysqli_fetch_array($querySubAddress);
        $rsHn = array(
            'status' => 200,
            'person' => array(
                'hn' => $fetchHn['hn'],
                'cid' => $fetchHn['cid'],
                'pname' => $fetchHn['pname'],
                'fname' => $fetchHn['fname'],
                'lname' => $fetchHn['lname'],
                'birthday' => $fetchHn['birthday'],
                'sex' => $fetchHn['sex'],
                'allergy' => $personDurgallergy,
                'address' => array(
                    'addr' => $fetchHn['addrpart'],
                    'tmbpart' => $arrFetchAddress[0],
                    'amppart' => $arrFetchAddress[1],
                    'chwpart' => $arrFetchAddress[2],
                    'mooparth' => $fetchSubAddress['area_name'],
                ),
                'moopart' => '0' . $fetchHn['moopart'],
                'tmbpart' => $fetchHn['tmbpart'],
                'amppart' => $fetchHn['amppart'],
                'chwpart' => $fetchHn['chwpart'],
            )
        );
    } else {
        $rsHn = array('status' => 400);
    }
    echo json_encode($rsHn);
         
    //
}


// //? ตัวนี้ใช้ Rh4cloud ที่เข้ามาลงทะเบียน 
function SearchHospcodeMain()
{
    global $serverHis;
    global $userHis;
    global $passHis;
    global $dbNameHis;
    global $objconnectHis;
    global $portHis;
    $searchIdHosMain = '';
    $searchNameHosMain = '';
    $hosId = array();
    $hosarray = array();
    if ($_POST['searchIdHosMain'] != '') {
        $searchHos = "SELECT hospcode,name FROM hospcode  where hospcode like '" . $_POST['searchIdHosMain'] . "%' ";
    }
    if ($_POST['searchNameHosMain'] != '') {
        $searchHos  =  "SELECT hospcode,name FROM hospcode  where name like '%" . $_POST['searchNameHosMain'] . "%' ";
    }
    $queryHos =pg_query(pg_connect("host=$serverHis port=$portHis dbname=$dbNameHis user=$userHis password=$passHis"), $searchHos);
    $countHos = pg_num_rows($queryHos);
    if ($countHos > 0) {
        while ($fetchHos = pg_fetch_array($queryHos)) {
            $hosId[] = '<tr onclick ="SelectValueHosnameMain(\'' . $fetchHos['hospcode'] . '\',\'' . $fetchHos['name'] . '\')"><td>' . $fetchHos['hospcode'] . '</td><td>' . $fetchHos['name'] . '</td></tr>';
        }
 
        $rsHos = array('status' => true, 'dataRes' => $hosId );
    } else {
        $rsHos = array('status' => false);
    }

  echo json_encode($rsHos);
}

function SearchHospcodeDes()
{
    global $serverHis;
    global $userHis;
    global $passHis;
    global $dbNameHis;
    global $objconnectHis;
    global $portHis;
    if ($_POST['searchIdHosDes'] != '') {
         $searchHos = "SELECT hospcode,name FROM hospcode  where hospcode like '" . $_POST['searchIdHosDes'] . "%' ";
    }
    if ($_POST['searchNameHosDes'] != '') {
        $searchHos  =  "SELECT hospcode,name FROM hospcode  where name like '%" . $_POST['searchNameHosDes'] . "%' ";
    }
    $queryHos = pg_query(pg_connect("host=$serverHis port=$portHis dbname=$dbNameHis user=$userHis password=$passHis"), $searchHos);
    $countHos = pg_num_rows($queryHos);
    if ($countHos > 0) {
        while ($fetchHos = pg_fetch_array($queryHos)) {
            $hosId[] = '<tr onclick ="SelectValueHosNameDes(\'' . $fetchHos['hospcode'] . '\',\'' . $fetchHos['name'] . '\')"><td>' . $fetchHos['hospcode'] . '</td><td>' . $fetchHos['name'] . '</td></tr>';
        }

        $rsHos = array('status' => true, 'dataRes' => $hosId);
    } else {
        $rsHos = array('status' => false);
    }

    echo json_encode($rsHos);
}

function ListDrugItems($hn){
    global $serverHis;
    global $userHis;
    global $passHis;
    global $dbNameHis;
    global $objconnectHis;
    global $portHis;
        $selectItemDrug = "SELECT * FROM opitemrece as opitem INNER JOIN drugitems as dugitem on dugitem.icode=opitem.icode INNER JOIN drugusage on drugusage.drugusage =dugitem.drugusage  WHERE opitem.hn ='".$hn."' ORDER BY opitem.vstdate DESC limit 15" ;
      $queryItemDrug = pg_query(pg_connect("host=$serverHis port=$portHis dbname=$dbNameHis user=$userHis password=$passHis"), $selectItemDrug);
      $countItems = pg_num_rows($queryItemDrug);
    $data = array();
    $item =array();
    if ($countItems==0) {
        $data = array("status"=>"false");
    }
    while ($row = pg_fetch_assoc($queryItemDrug)) {
        $date = $row['vstdate'];
        $item = array(
            "status" => "true",
            "drugname" => $row['name'],
            "unit" => $row['units'],
            "therapeutic" => $row['therapeutic'],
            "qty" => $row['qty'],
        );

        if (!isset($drugData[$date])) {
            $drugData[$date] = array();
        }

        if (!isset($drugData[$date]["optimerece"])) {
            $drugData[$date]["optimerece"] = array();
        }

        $drugData[$date]["optimerece"][] = $item;
    }
    // 4. แสดงผลลัพธ์เป็น Array
    echo json_encode($data);

}
function ListDrugLabs($hn){
    global $serverHis;
    global $userHis;
    global $passHis;
    global $dbNameHis;
    global $objconnectHis;
    global $portHis;
    $selectLabs = "SELECT l.lab_items_code,i.lab_items_name,i.lab_items_normal_value,h.order_date,
        if(i.lab_items_name NOT LIKE '%hiv%' AND i.lab_items_name NOT LIKE '%interpretation%',l.lab_order_result,'ปกปิด') AS lab_order_result 
        FROM lab_head h 
        INNER JOIN lab_order l ON h.lab_order_number = l.lab_order_number
        INNER JOIN lab_items i ON i.lab_items_code = l.lab_items_code 
        WHERE h.hn = '" . $hn . "'  ORDER BY h.order_date DESC";
    $querylabs = pg_query(pg_connect("host=$serverHis port=$portHis dbname=$dbNameHis user=$userHis password=$passHis"), $selectLabs);
    while ($fetchLabs = pg_fetch_array($querylabs)) {
        $date = $fetchLabs['order_date'];
        $item = array("lab" => "true", "type" => "Labs", "lab_items_code" => $fetchLabs['lab_items_code'], "lab_items_name" => $fetchLabs['lab_items_name'], "lab_items_normal_value" => $fetchLabs['lab_items_normal_value'], "lab_order_result" => $fetchLabs['lab_order_result']);
        $data[$date][] = $item;
    }
    echo json_encode($data);

}
 

if (isset($_POST['hn']) or isset($_POST['cid'])) {
    InputHn();
}

if (isset($_POST['searchIdHosMain']) or isset($_POST['searchNameHosMain'])) {
    SearchHospcodeMain();
}
if (isset($_POST['searchNameHosDes']) or isset($_POST['searchIdHosDes'])) {
    SearchHospcodeDes();
 
} 
if(isset($_POST['drugHn'])){ 
    ListDrugItems($_POST['drugHn']) ;
}
if(isset($_POST['drugLabs'])){
      ListDrugLabs($_POST['drugLabs']);
}

?>