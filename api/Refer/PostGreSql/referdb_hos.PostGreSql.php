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
    if ($status) {
        $arr[] = array('status' => true);
    } else {
        $arr[] = array('status' => false);
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
        $sql = "DELETE FROM user_login WHERE id ='" . $_POST['id'] . "'";
    }
    $status = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);
    if ($status) {
        $arr[] = array('status' => true);
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
    if ($status) {
        $arr[] = array('status' => true);
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
    if ($status) {
        $arr[] = array('status' => true);
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
    $sql = "INSERT INTO station (station_name) VALUES ('" . $_POST['station'] . "') ";
    $queryStation = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);
    $stationArr = array();
    if ($queryStation) {
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
    if ($querySelectStation) {
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
    $sql = "SELECT * FROM department ORDER BY dep_id DESC";
    $query =  pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);
    if ($query) {
        while ($rowDepartment = pg_fetch_array($query)) {
            $rsDepartment[] = array('status' => true, "id" => $rowDepartment["dep_id"], "name" => $rowDepartment["dep_name"], "station_name" => $rowDepartment["station_name"]);
        }
        $sqlDepartment = "SELECT * FROM station ";
        $queryDepartment =  pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlDepartment);
        while ($rowStaion = pg_fetch_array($queryDepartment)) {

            $rsStation[] = array('status' => true, "staion" => $rowStaion);
        }
    } else {
        $rsDepartment[] = array('status' => false);
    }
    $rsArrayMerge = array_merge(array("Department" => $rsDepartment), array("Station" => $rsStation));
    echo json_encode($rsArrayMerge);
}
function AddDepartment()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    global $objconnectRefer;
    $sql = "INSERT INTO department (dep_name,station_name) VALUES('" . $_POST["nameDeapartMent"] . "','" . $_POST["nameStationName"] . "')";
    $query = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);

    if ($query) {
        $rsDepartment[] = array('status' => true);
    } else {
        $rsDepartment[] = array('status' => false);
    }
    echo json_encode($rsDepartment);
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
        $sqlStation = "DELETE FROM department WHERE dep_id='" . $_POST['departmentId'] . "'";
        $fetchVale =  pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlStation);
        if ($fetchVale) {
            $rs[] = array("status" => true);
        }
    } else if ($_POST['departmentSource'] == "departmentName") {
        $sqlEditStation = "UPDATE department SET dep_name ='" . $_POST['departmentValue'] . "' WHERE dep_id ='" . $_POST['departmentId'] . "' ";
        $fetchVale = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditStation);
        if ($fetchVale) {
            $rs[] = array("status" => true);
        }
    } else if ($_POST['departmentSource'] == "stationName") {
        $sqlEditStation = "UPDATE department SET station_name ='" . $_POST['departmentValue'] . "' WHERE dep_id ='" . $_POST['departmentId'] . "' ";
        $fetchVale = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditStation);
        if ($fetchVale) {
            $rs[] = array("status" => true);
        }
    }
    echo json_encode($rs);
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

function AddRegCar()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sql = "INSERT INTO car_reg (reg_car) VALUES ('" . $_POST["carReg"] . "')";
    $query =  pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);
    if ($query) {
        $rs[] = array("status" => true);
    } else {
        $rs[] = array("status" => false);
    }
    echo json_encode($rs);
}

function EditDelCar()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;

    if ($_POST['carSource'] == "del") {
        $sqlStation = "DELETE FROM car_reg WHERE id_car='" . $_POST['carId'] . "'";
        $fetchVale =  pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlStation);
        if ($fetchVale) {
            $rs[] = array("status" => true);
        } else {
            $rs[] = array("status" => false);
        }
    } else if ($_POST['carSource'] == "carName") {
        $sqlEditStation = "UPDATE car_reg SET reg_car ='" . $_POST['carValue'] . "' WHERE id_car ='" . $_POST['carId'] . "' ";
        $fetchVale = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditStation);
        if ($fetchVale) {
            $rs[] = array("status" => true);
        } else {
            $rs[] = array("status" => false);
        }
    }
    echo json_encode($rs);
}

function GetTableCancleCase()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sql = "SELECT * FROM cancle_case";
    $query = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);
    if ($query) {
        while ($rowCar = pg_fetch_array($query)) {
            $rsCar[] = array('status' => true, "id" => $rowCar["id_case"], "name" => $rowCar["detail_note"]);
        }
    } else {
        $rsCar[] = array('status' => false);
    }
    echo json_encode($rsCar);
}

function AddCase()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    $sql = "INSERT INTO cancle_case (detail_note) value('" . $_POST["detailCase"] . "')";
    $query = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sql);
    if ($query) {
        $rs[] = array("status" => true);
    } else {
        $rs[] = array("status" => false);
    }
    echo json_encode($rs);
}
function EditDelCancleCase()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    global $portRefer;
    if ($_POST['cancleSource'] == "del") {
        $sqlStation = "DELETE FROM cancle_case WHERE id_case='" . $_POST['cancleId'] . "'";
        $fetchVale =  pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlStation);
        if ($fetchVale) {
            $rs[] = array("status" => true);
        } else {
            $rs[] = array("status" => false);
        }
    } else if ($_POST['cancleSource'] == "detailCase") {
        $sqlEditStation = "UPDATE cancle_case SET detail_note ='" . $_POST['cancleCaseValue'] . "' WHERE id_case ='" . $_POST['cancleId'] . "' ";
        $fetchVale = pg_query(pg_connect("host=$serverRefer port=$portRefer dbname=$dbNameRefer user=$userRefer password=$passRefer"), $sqlEditStation);
        if ($fetchVale) {
            $rs[] = array("status" => true);
        } else {
            $rs[] = array("status" => false);
        }
    }
    echo json_encode($rs);
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
