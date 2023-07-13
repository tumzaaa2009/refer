<?php
include('../file.refer.connec.php');
// Curd php  //
$serverRefer;
$userRefer;
$passRefer;
$dbNameRefer;
$objconnectRefer;
$portRefer;
function conDBdw()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $objconnectRefer = pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer");
 
    if (!$objconnectRefer) {
        echo "Failed to connect : " . mysqli_connect_error();
        exit();
    } else {
        pg_set_client_encoding($objconnectRefer, "utf8");
        $rsStation = array('status' => true, 'response' => 'connectSuscess');
    }
}
conDBdw();


function StationRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $select = "SELECT * FROM station";
    $queryStation = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $select);
    $station = array();

    while ($rowStationService = pg_fetch_array($queryStation)) {
        $station[] = $rowStationService;
    }

    $rsStation = array('status' => true, 'response' => $station);
    echo json_encode($rsStation);
}


function Ward()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectWard = "SELECT * FROM department WHERE station_name ='" . $_POST['ward'] . "'";
    $queryStationWard = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectWard);
    $stationWard = array();
    while ($rowStationService = pg_fetch_array($queryStationWard)) {
        $stationWard[] = $rowStationService;
    }
    $rsWard = array('status' => true, 'response' => $stationWard);
    echo json_encode($rsWard);
}



function LvActual()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;

    $selectLvActual = "SELECT * FROM level ORDER BY level_id ASC";
    $queryStationWard = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectLvActual);
    $lv = array();
    while ($rowStationService = pg_fetch_array($queryStationWard)) {
        $lv[] = $rowStationService;
    }
    $rslv = array('status' => true, 'response' => $lv);
    echo json_encode($rslv);
}

function pttype()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;

    $selectWard = "SELECT * FROM pttype";
    $queryStationWard = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectWard);
    $stationWard = array();
    while ($rowStationService = pg_fetch_array($queryStationWard)) {
        $stationWard[] = $rowStationService;
    }
    $rsWard = array('status' => true, 'response' => $stationWard);
    echo json_encode($rsWard);
}

function HosName()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectHosCode = "SELECT * FROM hospcode";
    $queryHosCode = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectHosCode);
    $data = array();
    $numRow = pg_num_rows($queryHosCode);
    while ($row = pg_fetch_array($queryHosCode, null, PGSQL_ASSOC)) {
        $data[] = $row;
    }
    $json = json_encode($data);
    echo $json;
}

function SelectGroupClinic()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectClinicSubGroup = "SELECT ClinicSub_id,ClinicSub_name FROM clinicgroupsub";
    $queryClinicSubGroup = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectClinicSubGroup);
    $countSubGroup = pg_num_rows($queryClinicSubGroup);
    while ($rowStationService = pg_fetch_array($queryClinicSubGroup)) {
        $selectGroupClinic[] = '<option value="' . $rowStationService['ClinicSub_name'] . '">' . $rowStationService['ClinicSub_name'] . '</option>';
    }
    $rsWard = array('status' => true, 'response' => $selectGroupClinic);
    $json = json_encode($rsWard);
    echo $json;
}

function typept()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectTypept = "SELECT typept_id,typept_name FROM typept";
    $queryTypept = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectTypept);
    $optionTags = array();
    while ($rowTypept = pg_fetch_array($queryTypept)) {
        $optionTags[] = '<option value="' . $rowTypept['typept_name'] . '">' . $rowTypept['typept_name'] . '</option>';
    }
    $rsTypept = array('status' => true, 'response' => $optionTags);
    $json = json_encode($rsTypept);
    echo $json;
}

function loads()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectLoads = "SELECT loads_id,loads_name FROM loads";
    $queryLoads = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectLoads);
    $optionloads = array();
    while ($rowLoads = pg_fetch_array($queryLoads)) {
        $optionloads[] = '<option value="' . $rowLoads['loads_name'] . '">' . $rowLoads['loads_name'] . '</option>';
    }
    $json = json_encode($optionloads);
    echo $json;
}

function ServicePlane()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectServicePlane = "SELECT service_id,service_name FROM serviceplan";
    $queryServicePlane = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectServicePlane);
    $optionServicePlane = array();
    while ($rowServicePlane = pg_fetch_array($queryServicePlane)) {
        $optionServicePlane[] = '<option value="' . $rowServicePlane['service_name'] . '">' . $rowServicePlane['service_name'] . '</option>';
    }
    $json = json_encode($optionServicePlane);
    echo $json;
}

function CaseReferOut()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectCauseReferOut = "SELECT cause_referout_name,cause_referout_id FROM cause_referout";
    $queryCauseReferOut = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectCauseReferOut);
    $optionReferOut = array();
    while ($rowCauseReferOut = pg_fetch_array($queryCauseReferOut)) {
        $optionReferOut[] = '<option value="' . $rowCauseReferOut['cause_referout_name'] . '">' . $rowCauseReferOut['cause_referout_name'] . '</option>';
    }
    $json = json_encode($optionReferOut);
    echo $json;
}

function DoctorName()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectDoctorName = "SELECT doctor_id ,doctor_name FROM doctor WHERE doctor_status='true'";
    $queryDoctorName = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectDoctorName);
    $optionDoctorname = array();
    $optionReferOut[] = "<option value='0'>โปรดระบุบแพทย์ผู้สั่ง</option>";
    while ($rowDoctorName = pg_fetch_array($queryDoctorName)) {
        $optionReferOut[] = ' <option value="' . $rowDoctorName['doctor_name'] . '">' . $rowDoctorName['doctor_name'] . '</option>';
    }
    $json = json_encode($optionReferOut);
    echo $json;
}

function CoordinateIsName()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectCoordinateIs = "SELECT coordinate_is_id,coordinate_is_name FROM coordinate_is";
    $queryCoordinateIs = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectCoordinateIs);
    $optionCoordinateIs = array();
    while ($rowCoordinateIs = pg_fetch_array($queryCoordinateIs)) {
        $optionReferOut[] = '<option value="' . $rowCoordinateIs['coordinate_is_name'] . '">' . $rowCoordinateIs['coordinate_is_name'] . '</option>';
    }
    $json = json_encode($optionReferOut);
    echo $json;
}

function conscious()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectConscious = "SELECT conscious_id,conscious_name FROM conscious";
    $queryConscious = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectConscious);
    $optionConscious = array();
    while ($rowConscious = pg_fetch_array($queryConscious)) {
        $optionConscious[] = '<option value= "' . $rowConscious['conscious_name'] . '">' . $rowConscious['conscious_name'] . '</option>';
    }
    $json = json_encode($optionConscious);
    echo $json;
}

function SearchIcd10()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['searchIdHosIcd10'] != '') {
        $searchIcd10 = "SELECT code,name FROM icd10 where code like '" . $_POST['searchIdHosIcd10'] . "%' ";
    }
    if ($_POST['searchNameIcd10'] != '') {
        $searchIcd10 = "SELECT code,name FROM icd10 where name like '%" . $_POST['searchNameIcd10'] . "%' ";
    }
    $queryIcd10 = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $searchIcd10);
    $countIcd10 = pg_num_rows($queryIcd10);
    if ($countIcd10 > 0) {
        while ($fetchIcd10 = pg_fetch_array($queryIcd10)) {
            $hosId[] = '<tr onclick ="SelectValueIcd10(\'' . $fetchIcd10['code'] . '\',\'' . $fetchIcd10['name'] . '\')"><td>' . $fetchIcd10['code'] . '</td><td>' . $fetchIcd10['name'] . '</td></tr>';
        }
        $rsHos = array('status' => true, 'dataRes' => $hosId);
    } else {
        $rsHos = array('status' => false);
    }


    echo json_encode($rsHos);
}

function SettingAdmin($admin, $pass)
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectAdmin = "SELECT * FROM user_login WHERE user_name = '" . $admin . "' and user_password = '" . $pass . "' and status='true'";
    $queryAdmin =  pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectAdmin);
    $countAdmin = pg_num_rows($queryAdmin);
    if ($countAdmin == 0)
        $rsHos = array('status' => false);
    while ($fetchAdmin = pg_fetch_array($queryAdmin)) {
        $rsHos = array('status' => true, 'dataRes' => $fetchAdmin);
    }
    echo json_encode($rsHos);
}

function GetTableUser()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sql = "SELECT * FROM user_login ";
    $queryUser =  pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);
    $rsHos = array();
    while ($fetchDoctor = pg_fetch_array($queryUser)) {
        $rsHos[] = array('status' => true, $fetchDoctor);
    }
    echo json_encode($rsHos);
}

function AddUser()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $countAuthRefer = count($_POST["authRefer"]);
    $arrayAuthRefer = [];
    $countAuthRefer;
    for ($i = 0; $i < $countAuthRefer; $i++) {
        array_push($arrayAuthRefer, $_POST["authRefer"][$i]);
    }
    $insertAddUser = "INSERT INTO user_login(user_name,user_password,name_user,section_detail,tel,auth_refer,status)
    VALUES('" . $_POST['username'] . "','" . $_POST['userpassword'] . "','" . $_POST['myName'] . "','" . $_POST['lcationDetail'] . "','" . $_POST['userTel'] . "','" . json_encode($arrayAuthRefer) . "','" . $_POST['status'] . "')";
    $status =   pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $insertAddUser);
    if ($status == 1) {
        $arr[] = array('status' => true, 'status' => $status);
    } else {
        $arr[] = array('status' => false, 'status' => $status);
    }
    echo json_encode($arr);
}
function EditUser()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['source'] == "userName") {
        $sql = "UPDATE user_login SET user_name ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "userPassWord") {
        $sql = "UPDATE user_login SET user_password ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "nameUser") {
        $sql = "UPDATE user_login SET name_user ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "sectionDetail") {
        $sql = "UPDATE user_login SET section_detail ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "tel") {
        $sql = "UPDATE user_login SET tel ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "authRefer") {
        $sql = "UPDATE user_login SET auth_refer ='" . json_encode($_POST['resultEditUser']) . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "status") {
        $sql = "UPDATE user_login SET status ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "del") {
        $sql = "DELETE user_login WHERE id ='" . $_POST['id'] . "'";
    }
    $status = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);
    if ($status == 1) {
        $arr[] = array('status' => true, 'status' => $status);
    } else {
        $arr[] = array('status' => false, 'status' => $status);
    }
    echo json_encode($arr);
}

function GetTableDoctor()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectDoctor = "SELECT doctor_id,doctor_name,doctor_status FROM doctor";
    $queryDoctor = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectDoctor);
    $rsHos = array();
    while ($fetchDoctor = pg_fetch_array($queryDoctor)) {
        $rsHos[] = array('status' => true, "id" => $fetchDoctor['doctor_id'], 'Name' => $fetchDoctor['doctor_name'], 'StatusDoctor' => $fetchDoctor['doctor_status']);
    }
    echo json_encode($rsHos);
}

// ?? AddDoctor
function AddDortor($post)
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $insertAddDoctor = "INSERT INTO doctor (doctor_name,doctor_status,doctor_tel) VALUES('" . $post['namedoctor'] . " " . $post['lastnamedoctor'] . "', '" . $post['status'] . "','" . $post['telDoctor'] . "' )";
    $status = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $insertAddDoctor);
    $arr = [];
    if ($status == 1) {
        $arr[] = array('status' => true, 'status' => $status);
    } else {
        $arr[] = array('status' => false, 'status' => $status);
    }
    echo json_encode($arr);
}
function EditDoctorname($value, $id, $souce)
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($souce == "doctorNameEdit") {
        $Update = "SET doctor_name ='" . $value . "' WHERE doctor_id ='" . $id . "'";
        $upDateDoctor = "UPDATE doctor $Update ";
    } else if ($souce == "status") {
        $Update = "SET doctor_status = '" . $value . "' WHERE doctor_id ='" . $id . "'";
        $upDateDoctor = "UPDATE doctor $Update ";
    } else {
        $upDateDoctor = "DELETE FROM doctor   WHERE doctor_id ='" . $id . "'";
    }
    $status =  pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $upDateDoctor);
    if ($status == 1) {
        $arr[] = array('status' => true, 'status' => $status);
    } else {
        $arr[] = array('status' => false, 'status' => $status);
    }
    echo json_encode($arr);
}

function ModalDerivery()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectModalDerivery = "SELECT * FROM derivery_service_refer ";
    $queryModalDerivery = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectModalDerivery);
    $rsModalDerivery = array();
    while ($fetchDeriver = pg_fetch_array($queryModalDerivery)) {
        $rsHos[] = array('status' => true, "id" => $fetchDeriver['id_service'], 'Name' => $fetchDeriver['name_service'], 'StatusDoctor' => $fetchDeriver['status_service']);
    }
    echo json_encode($rsHos);
}

function tableStation()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $selectStation = "SELECT * FROM station";
    $queryStation = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $selectStation);
    $rsStation = array();
    while ($fetchStation = pg_fetch_array($queryStation)) {
        $rsStation[] = array('status' => true, "data" => $fetchStation);
    }
    echo json_encode($rsStation);
}

function AddStationRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sql = "INSERT INTO station (station_name) value('" . $_POST['station'] . "') ";
    $queryStation = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);
    $stationArr = array();
    if ($queryStation == 1) {
        $sqlSelectStation = "SELECT * FROM station";
        $querySelectStation = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectStation);
        while ($fetchStation = pg_fetch_array($querySelectStation)) {
            $stationArr['res'][] = $fetchStation['station_name'];
        }
        $resultArr = array('status' => true, "hosCode" => $_POST['hosCode'], "res" => $stationArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function EditDelStation()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['stationSource'] == "del") {
        $sqlStation = "DELETE FROM station WHERE station_id='" . $_POST['stationId'] . "'";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlStation);
    } else if ($_POST['stationSource'] == "stationName") {
        $sqlEditStation = "UPDATE station SET station_name ='" . $_POST['stationValue'] . "' WHERE station_id ='" . $_POST['stationId'] . "' ";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditStation);
    }

    $sqlSelectStation = "SELECT * FROM station";
    $querySelectStation = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectStation);
    while ($fetchStation = pg_fetch_array($querySelectStation)) {
        $stationArr['res'][] = $fetchStation['station_name'];
    }
    if ($querySelectStation == 1) {
        $resultArr = array('status' => true, "hosCode" => $_POST['hosCode'], "res" => $stationArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}

function GetTableDepartment()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlSelectDepartment = "SELECT * FROM department";
    $querySelectDepartment = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectDepartment);
    while ($fetchDepartment = pg_fetch_array($querySelectDepartment)) {
        $DepartmentArr['res'][] = $fetchDepartment['department_name'];
    }
    if ($querySelectDepartment == 1) {
        $resultArr = array('status' => true, "res" => $DepartmentArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function AddDepartment()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlInsertDepartment = "INSERT INTO department (department_name,station_name) value('" . $_POST['departmentName'] . "','" . $_POST['station'] . "') ";
    $queryInsertDepartment = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlInsertDepartment);
    if ($queryInsertDepartment == 1) {
        $sqlSelectDepartment = "SELECT * FROM department";
        $querySelectDepartment = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectDepartment);
        while ($fetchDepartment = pg_fetch_array($querySelectDepartment)) {
            $DepartmentArr['res'][] = $fetchDepartment['department_name'];
        }
        $resultArr = array('status' => true, "res" => $DepartmentArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}

function EditDelDepartment()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['departmentSource'] == "del") {
        $sqlStation = "DELETE FROM department WHERE department_id='" . $_POST['departmentId'] . "'";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlStation);
    } else if ($_POST['departmentSource'] == "departmentName") {
        $sqlEditDepartment = "UPDATE department SET department_name ='" . $_POST['departmentValue'] . "' WHERE department_id ='" . $_POST['departmentId'] . "' ";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditDepartment);
    }
    $sqlSelectDepartment = "SELECT * FROM department";
    $querySelectDepartment = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectDepartment);
    while ($fetchDepartment = pg_fetch_array($querySelectDepartment)) {
        $DepartmentArr['res'][] = $fetchDepartment['department_name'];
    }
    if ($querySelectDepartment == 1) {
        $resultArr = array('status' => true, "res" => $DepartmentArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}

function AddTypeRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlInsertTypeRefer = "INSERT INTO type_refer (type_refer_name) value('" . $_POST['typeRefer'] . "') ";
    $queryInsertTypeRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlInsertTypeRefer);
    if ($queryInsertTypeRefer == 1) {
        $sqlSelectTypeRefer = "SELECT * FROM type_refer";
        $querySelectTypeRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectTypeRefer);
        while ($fetchTypeRefer = pg_fetch_array($querySelectTypeRefer)) {
            $TypeReferArr['res'][] = $fetchTypeRefer['type_refer_name'];
        }
        $resultArr = array('status' => true, "res" => $TypeReferArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}

function GetTableTypeRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlSelectTypeRefer = "SELECT * FROM type_refer";
    $querySelectTypeRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectTypeRefer);
    while ($fetchTypeRefer = pg_fetch_array($querySelectTypeRefer)) {
        $TypeReferArr['res'][] = $fetchTypeRefer['type_refer_name'];
    }
    if ($querySelectTypeRefer == 1) {
        $resultArr = array('status' => true, "res" => $TypeReferArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}

function EditDelTypeRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['typeReferSource'] == "del") {
        $sqlStation = "DELETE FROM type_refer WHERE type_refer_id='" . $_POST['typeReferId'] . "'";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlStation);
    } else if ($_POST['typeReferSource'] == "typeReferName") {
        $sqlEditDepartment = "UPDATE type_refer SET type_refer_name ='" . $_POST['typeReferValue'] . "' WHERE type_refer_id ='" . $_POST['typeReferId'] . "' ";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditDepartment);
    }
    $sqlSelectTypeRefer = "SELECT * FROM type_refer";
    $querySelectTypeRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectTypeRefer);
    while ($fetchTypeRefer = pg_fetch_array($querySelectTypeRefer)) {
        $TypeReferArr['res'][] = $fetchTypeRefer['type_refer_name'];
    }
    if ($querySelectTypeRefer == 1) {
        $resultArr = array('status' => true, "res" => $TypeReferArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function AddCauseReferout()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlInsertCauseReferout = "INSERT INTO cause_referout (cause_referout_name) value('" . $_POST['causeReferout'] . "') ";
    $queryInsertCauseReferout = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlInsertCauseReferout);
    if ($queryInsertCauseReferout == 1) {
        $sqlSelectCauseReferout = "SELECT * FROM cause_referout";
        $querySelectCauseReferout = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectCauseReferout);
        while ($fetchCauseReferout = pg_fetch_array($querySelectCauseReferout)) {
            $CauseReferoutArr['res'][] = $fetchCauseReferout['cause_referout_name'];
        }
        $resultArr = array('status' => true, "res" => $CauseReferoutArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function GetTableCauseReferout()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlSelectCauseReferout = "SELECT * FROM cause_referout";
    $querySelectCauseReferout = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectCauseReferout);
    while ($fetchCauseReferout = pg_fetch_array($querySelectCauseReferout)) {
        $CauseReferoutArr['res'][] = $fetchCauseReferout['cause_referout_name'];
    }
    if ($querySelectCauseReferout == 1) {
        $resultArr = array('status' => true, "res" => $CauseReferoutArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function EditDelCauseReferout()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['causeReferoutSource'] == "del") {
        $sqlCauseReferout = "DELETE FROM cause_referout WHERE cause_referout_id='" . $_POST['causeReferoutId'] . "'";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlCauseReferout);
    } else if ($_POST['causeReferoutSource'] == "causeReferoutName") {
        $sqlEditCauseReferout = "UPDATE cause_referout SET cause_referout_name ='" . $_POST['causeReferoutValue'] . "' WHERE cause_referout_id ='" . $_POST['causeReferoutId'] . "' ";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditCauseReferout);
    }
    $sqlSelectCauseReferout = "SELECT * FROM cause_referout";
    $querySelectCauseReferout = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectCauseReferout);
    while ($fetchCauseReferout = pg_fetch_array($querySelectCauseReferout)) {
        $CauseReferoutArr['res'][] = $fetchCauseReferout['cause_referout_name'];
    }
    if ($querySelectCauseReferout == 1) {
        $resultArr = array('status' => true, "res" => $CauseReferoutArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function AddDrugReferout()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlInsertDrugReferout = "INSERT INTO drug_referout (drug_referout_name) value('" . $_POST['drugReferout'] . "') ";
    $queryInsertDrugReferout = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlInsertDrugReferout);
    if ($queryInsertDrugReferout == 1) {
        $sqlSelectDrugReferout = "SELECT * FROM drug_referout";
        $querySelectDrugReferout = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectDrugReferout);
        while ($fetchDrugReferout = pg_fetch_array($querySelectDrugReferout)) {
            $DrugReferoutArr['res'][] = $fetchDrugReferout['drug_referout_name'];
        }
        $resultArr = array('status' => true, "res" => $DrugReferoutArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function GetTableDrugReferout()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlSelectDrugReferout = "SELECT * FROM drug_referout";
    $querySelectDrugReferout = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectDrugReferout);
    while ($fetchDrugReferout = pg_fetch_array($querySelectDrugReferout)) {
        $DrugReferoutArr['res'][] = $fetchDrugReferout['drug_referout_name'];
    }
    if ($querySelectDrugReferout == 1) {
        $resultArr = array('status' => true, "res" => $DrugReferoutArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function EditDelDrugReferout()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['drugReferoutSource'] == "del") {
        $sqlDrugReferout = "DELETE FROM drug_referout WHERE drug_referout_id='" . $_POST['drugReferoutId'] . "'";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlDrugReferout);
    } else if ($_POST['drugReferoutSource'] == "drugReferoutName") {
        $sqlEditDrugReferout = "UPDATE drug_referout SET drug_referout_name ='" . $_POST['drugReferoutValue'] . "' WHERE drug_referout_id ='" . $_POST['drugReferoutId'] . "' ";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditDrugReferout);
    }
    $sqlSelectDrugReferout = "SELECT * FROM drug_referout";
    $querySelectDrugReferout = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectDrugReferout);
    while ($fetchDrugReferout = pg_fetch_array($querySelectDrugReferout)) {
        $DrugReferoutArr['res'][] = $fetchDrugReferout['drug_referout_name'];
    }
    if ($querySelectDrugReferout == 1) {
        $resultArr = array('status' => true, "res" => $DrugReferoutArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}

function AddSystemRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlInsertSystemRefer = "INSERT INTO system_refer (system_refer_name) value('" . $_POST['systemRefer'] . "') ";
    $queryInsertSystemRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlInsertSystemRefer);
    if ($queryInsertSystemRefer == 1) {
        $sqlSelectSystemRefer = "SELECT * FROM system_refer";
        $querySelectSystemRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectSystemRefer);
        while ($fetchSystemRefer = pg_fetch_array($querySelectSystemRefer)) {
            $SystemReferArr['res'][] = $fetchSystemRefer['system_refer_name'];
        }
        $resultArr = array('status' => true, "res" => $SystemReferArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function GetTableSystemRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlSelectSystemRefer = "SELECT * FROM system_refer";
    $querySelectSystemRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectSystemRefer);
    while ($fetchSystemRefer = pg_fetch_array($querySelectSystemRefer)) {
        $SystemReferArr['res'][] = $fetchSystemRefer['system_refer_name'];
    }
    if ($querySelectSystemRefer == 1) {
        $resultArr = array('status' => true, "res" => $SystemReferArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function EditDelSystemRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['systemReferSource'] == "del") {
        $sqlSystemRefer = "DELETE FROM system_refer WHERE system_refer_id='" . $_POST['systemReferId'] . "'";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSystemRefer);
    } else if ($_POST['systemReferSource'] == "systemReferName") {
        $sqlEditSystemRefer = "UPDATE system_refer SET system_refer_name ='" . $_POST['systemReferValue'] . "' WHERE system_refer_id ='" . $_POST['systemReferId'] . "' ";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditSystemRefer);
    }
    $sqlSelectSystemRefer = "SELECT * FROM system_refer";
    $querySelectSystemRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectSystemRefer);
    while ($fetchSystemRefer = pg_fetch_array($querySelectSystemRefer)) {
        $SystemReferArr['res'][] = $fetchSystemRefer['system_refer_name'];
    }
    if ($querySelectSystemRefer == 1) {
        $resultArr = array('status' => true, "res" => $SystemReferArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function AddRiskRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlInsertRiskRefer = "INSERT INTO risk_refer (risk_refer_name) value('" . $_POST['riskRefer'] . "') ";
    $queryInsertRiskRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlInsertRiskRefer);
    if ($queryInsertRiskRefer == 1) {
        $sqlSelectRiskRefer = "SELECT * FROM risk_refer";
        $querySelectRiskRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectRiskRefer);
        while ($fetchRiskRefer = pg_fetch_array($querySelectRiskRefer)) {
            $RiskReferArr['res'][] = $fetchRiskRefer['risk_refer_name'];
        }
        $resultArr = array('status' => true, "res" => $RiskReferArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function GetTableRiskRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sqlSelectRiskRefer = "SELECT * FROM risk_refer";
    $querySelectRiskRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectRiskRefer);
    while ($fetchRiskRefer = pg_fetch_array($querySelectRiskRefer)) {
        $RiskReferArr['res'][] = $fetchRiskRefer['risk_refer_name'];
    }
    if ($querySelectRiskRefer == 1) {
        $resultArr = array('status' => true, "res" => $RiskReferArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}
function EditDelRiskRefer()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['riskReferSource'] == "del") {
        $sqlRiskRefer = "DELETE FROM risk_refer WHERE risk_refer_id='" . $_POST['riskReferId'] . "'";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlRiskRefer);
    } else if ($_POST['riskReferSource'] == "riskReferName") {
        $sqlEditRiskRefer = "UPDATE risk_refer SET risk_refer_name ='" . $_POST['riskReferValue'] . "' WHERE risk_refer_id ='" . $_POST['riskReferId'] . "' ";
        pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditRiskRefer);
    }
    $sqlSelectRiskRefer = "SELECT * FROM risk_refer";
    $querySelectRiskRefer = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlSelectRiskRefer);
    while ($fetchRiskRefer = pg_fetch_array($querySelectRiskRefer)) {
        $RiskReferArr['res'][] = $fetchRiskRefer['risk_refer_name'];
    }
    if ($querySelectRiskRefer == 1) {
        $resultArr = array('status' => true, "res" => $RiskReferArr['res']);
    } else {
        $resultArr[] = array('status' => false);
    }
    echo json_encode($resultArr);
}

function GetTabelCar()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sql = "SELECT * FROM car_reg ORDER BY id_car DESC";
    $query = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);

    if ($query) {
        while ($rowCar = pg_fetch_array($query)) {
            $rsCar[] = array('status' => true, "id" => $rowCar["id_car"], "name" => $rowCar["reg_car"]);
        }
    } else {
        $rsCar[] = array('status' => false);
    }


    echo json_encode($rsCar);
}

//* เรียกใช้การทำงาน //

if (isset($_POST['servicestation'])) {
    StationRefer();
}
if (isset($_POST['ward'])) {
    Ward();
}
if (isset($_POST['lvActual'])) {
    LvActual();
}
if (isset($_POST['pttype'])) {
    pttype();
}
if (isset($_POST['clinicGrop'])) {
    SelectGroupClinic();
}
if (isset($_POST['Typept'])) {
    typept();
}
if (isset($_POST['loads'])) {
    loads();
}
if (isset($_POST['servicePLane'])) {
    ServicePlane();
}
if (isset($_POST['caseReferOut'])) {
    CaseReferOut();
}
if (isset($_POST['doctorName'])) {
    DoctorName();
}
if (isset($_POST['CoordinateName'])) {
    CoordinateIsName();
}
if (isset($_POST['conscious'])) {
    conscious();
}
if (isset($_POST['searchIdHosIcd10']) or isset($_POST['searchNameIcd10'])) {
    SearchIcd10();
}
if (isset($_POST['userNameAdmin']) && isset($_POST['userPasswordAdmin'])) {

    SettingAdmin($_POST['userNameAdmin'], $_POST['userPasswordAdmin']);
}

if (isset($_POST['tableUser'])) {
    GetTableUser();
}
if (isset($_POST['username']) && isset($_POST["userpassword"]) && isset($_POST["myName"]) && isset($_POST["lcationDetail"]) && isset($_POST["userTel"]) && isset($_POST["authRefer"])) {
    AddUser($_POST);
}
if (isset($_POST['resultEditUser'])) {
    EditUser($_POST);
}
if (isset($_POST['Doctor'])) {
    GetTableDoctor();
}
if (isset($_POST["namedoctor"]) && isset($_POST["lastnamedoctor"]) && isset($_POST["status"])) {
    AddDortor($_POST);
}
if (isset($_POST['resultEditDoctor'])) {
    EditDoctorname($_POST['resultEditDoctor'], $_POST['id'], $_POST['source']);
}
if (isset($_POST['modalDerivery'])) {
    ModalDerivery();
}

if (isset($_POST['tableStation'])) {
    tableStation();
}
if (isset($_POST['station']) && isset($_POST['hosCode'])) {
    AddStationRefer();
}
if (isset($_POST['stationValue']) && isset($_POST['stationId']) && isset($_POST['stationSource']) && isset($_POST['hosCode'])) {
    EditDelStation();
}
if (isset($_POST['Department'])) {
    GetTableDepartment();
}
if (isset($_POST['nameDeapartMent'])) {
    AddDepartment();
}
if (isset($_POST['departmentValue']) && isset($_POST['departmentId']) && isset($_POST['departmentSource'])) {
    EditDelDepartment();
}
if (isset($_POST['car'])) {
    GetTabelCar();
}
if (isset($_POST['carReg']) && isset($_POST['hosCode'])) {
    AddRegCar();
}
if (isset($_POST['carValue']) && isset($_POST['carId']) && isset($_POST['carSource'])) {
    EditDelCar();
}
if (isset($_POST['cancleCase'])) {

    GetTableCancleCase();
}
if (isset($_POST['detailCase']) && isset($_POST['hosCode'])) {
    AddCase();
}
if (isset($_POST['cancleCaseValue']) && isset($_POST['cancleId']) && isset($_POST['cancleSource'])) {

    EditDelCancleCase();
}
