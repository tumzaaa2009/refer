<?php
include('../file.refer.connec.php');
// Curd php  //
$serverRefer;
$userRefer;
$passRefer;
$dbNameRefer;
$objconnectRefer;
function conDBdw()
{
    global $serverRefer;
    global $userRefer;
    global $passRefer;
    global $dbNameRefer;
    global $objconnectRefer;
    $objconnectRefer = mysqli_connect($serverRefer, $userRefer, $passRefer, $dbNameRefer);
    date_default_timezone_set('Asia/Bangkok');
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        mysqli_query($objconnectRefer, "SET CHARACTER SET UTF8");
    }
} //end
conDBdw();
function StationRefer()
{
    global $objconnectRefer;
    $select = "SELECT * From station";
    $queryStation = mysqli_query($objconnectRefer, $select);
    $station = array();
    while ($rowStationService = mysqli_fetch_array($queryStation)) {
        $station[] = $rowStationService;
    }
    $rsStation = array('status' => true, 'response' => $station);
    echo json_encode($rsStation);
}
function Ward()
{

    global $objconnectRefer;
    $selectWard = "SELECT * FROM department WHERE station_name ='" . $_POST['ward'] . "'";
    $queryStationWard = mysqli_query($objconnectRefer, $selectWard);
    $stationWard = array();
    while ($rowStationService = mysqli_fetch_array($queryStationWard)) {
        $stationWard[] = $rowStationService;
    }
    $rsWard = array('status' => true, 'response' => $stationWard);
    echo json_encode($rsWard);
}

function LvActual()
{
    global  $objconnectRefer;

    $selectLvActual = "SELECT * FROM level WHERE staion_name ='" . $_POST['lvActual'] . "' ORDER BY level_id ASC";
    $queryStationWard = mysqli_query($objconnectRefer, $selectLvActual);
    $lv = array();
    while ($rowStationService = mysqli_fetch_array($queryStationWard)) {
        $lv[] = $rowStationService;
    }
    $rslv = array('status' => true, 'response' => $lv);
    echo json_encode($rslv);
}
function pttype()
{
    global $objconnectRefer;
    $selectWard = "SELECT * FROM pttype";
    $queryStationWard = mysqli_query($objconnectRefer, $selectWard);
    $stationWard = array();
    while ($rowStationService = mysqli_fetch_array($queryStationWard)) {
        $stationWard[] = $rowStationService;
    }
    $rsWard = array('status' => true, 'response' => $stationWard);
    echo json_encode($rsWard);
}

function HosName()
{
    global $objconnectRefer;
    $selectHosCode = "SELECT * FROM hospcode";
    $queryHosCode = mysqli_query($objconnectRefer, $selectHosCode);
    $data = array();
    $numRow = mysqli_num_rows($queryHosCode);
    while ($row = mysqli_fetch_array($queryHosCode, MYSQLI_ASSOC)) {
        $data[] = $row;
    }

    $json = json_encode($data);
    echo $json;
}

function SelectGroupClinic()
{
    global $objconnectRefer;
    // echo "selectGropClinic";
    $selectClinicSubGroup = "SELECT ClinicSub_id,ClinicSub_name FROM clinicgroupsub  ";
    $queryClinicSubGroup = mysqli_query($objconnectRefer, $selectClinicSubGroup);
    $countSubGroup = mysqli_num_rows($queryClinicSubGroup);
    while ($rowStationService = mysqli_fetch_array($queryClinicSubGroup)) {
        $selectGroupClinic[] = '<option value="' . $rowStationService['ClinicSub_name'] . '">' . $rowStationService['ClinicSub_name'] . '</option>';
    }
    $rsWard = array('status' => true, 'response' => $selectGroupClinic);
    $json = json_encode($rsWard);
    echo $json;
}

// * ประเภทผู้ป่วย
function typept()
{
    global $objconnectRefer;
    $selectTypept = "SELECT typept_id,typept_name FROM typept";
    $queryTypept = mysqli_query($objconnectRefer, $selectTypept);
    $optionTags = array();
    while ($rowTypept = mysqli_fetch_array($queryTypept)) {
        $optionTags[] = '<option value=\'' . $rowTypept['typept_name'] . '\'>' . $rowTypept['typept_name'] . '</option>';
    }
    $rsTypept = array('status' => true, 'response' => $optionTags);
    $json = json_encode($rsTypept);
    echo $json;
}

// *การส่งตัว
function loads()
{
    global $objconnectRefer;
    $selectLoads = "SELECT loads_id,loads_name FROM loads ";
    $queryLoads = mysqli_query($objconnectRefer, $selectLoads);
    $optionloads = array();

    while ($rowLoads = mysqli_fetch_array($queryLoads)) {
        $optionloads[] = '<option value=\'' . $rowLoads['loads_name'] . '\'>' . $rowLoads['loads_name'] . '</option>';
    }
    $json = json_encode($optionloads);
    echo $json;
}

// * service plane
function ServicePlane()
{
    global $objconnectRefer;
    $selectServicePlane = "SELECT service_id,service_name FROM serviceplan ";
    $queryServicePlane = mysqli_query($objconnectRefer, $selectServicePlane);
    $optionServicePlane = array();
    while ($rowServicePlane = mysqli_fetch_array($queryServicePlane)) {
        $optionServicePlane[] = '<option value=\'' . $rowServicePlane['service_name'] . '\'>' . $rowServicePlane['service_name'] . '</option>';
    }
    $json = json_encode($optionServicePlane);
    echo $json;
}
// * เหตุผลการส่งตัว
function CaseReferOut()
{
    global $objconnectRefer;
    $selectCauseReferOut = "SELECT cause_referout_name,cause_referout_id FROM cause_referout ";
    $queryCauseReferOut = mysqli_query($objconnectRefer, $selectCauseReferOut);

    $optionReferOut = array();
    while ($rowCauseReferOut = mysqli_fetch_array($queryCauseReferOut)) {
        $optionReferOut[] = '<option value=\'' . $rowCauseReferOut['cause_referout_name'] . '\'>' . $rowCauseReferOut['cause_referout_name'] . '</option>';
    }
    $json = json_encode($optionReferOut);
    echo $json;
}

function DoctorName()
{
    global $objconnectRefer;
    $selectDoctorName = "SELECT doctor_id ,doctor_name FROM doctor WHERE doctor_status='true'";
    $queryDoctorName = mysqli_query($objconnectRefer, $selectDoctorName);
    $optionDoctorname = array();
    $optionReferOut[]  = "<option value='0'>โปรดระบุบแพทย์ผู้สั่ง</option>";
    while ($rowDoctorName = mysqli_fetch_array($queryDoctorName)) {
        $optionReferOut[] = ' <option value=\'' . $rowDoctorName['doctor_name'] . '\'>' . $rowDoctorName['doctor_name'] . '</option>';
    }
    $json = json_encode($optionReferOut);
    echo $json;
}

function CoordinateIsName()
{
    global $objconnectRefer;
    $selectCoordinateIs = "SELECT coordinate_is_id,coordinate_is_name FROM coordinate_is ";
    $queryCoordinateIs = mysqli_query($objconnectRefer, $selectCoordinateIs);
    $optionCoordinateIs = array();
    while ($rowCoordinateIs = mysqli_fetch_array($queryCoordinateIs)) {
        $optionReferOut[] = '<option value=\'' . $rowCoordinateIs['coordinate_is_name'] . '\'>' . $rowCoordinateIs['coordinate_is_name'] . '</option>';
    }
    $json = json_encode($optionReferOut);
    echo $json;
}
function conscious()
{
    global $objconnectRefer;
    $selectConscious = "SELECT conscious_id,conscious_name FROM conscious ";
    $queryConscious = mysqli_query($objconnectRefer, $selectConscious);
    $optionConscious = array();
    while ($rowConscious = mysqli_fetch_array($queryConscious)) {
        $optionConscious[] = '<option value=\'' . $rowConscious['conscious_name'] . '\'>' . $rowConscious['conscious_name'] . '</option>';
    }
    $json = json_encode($optionConscious);
    echo $json;
}

function SearchIcd10()
{
    global $objconnectRefer;
    if ($_POST['searchIdHosIcd10'] != '') {
        $searchIcd10 = "SELECT code,name FROM icd10  where code like '" . $_POST['searchIdHosIcd10'] . "%' ";
    }
    if ($_POST['searchNameIcd10'] != '') {
        $searchIcd10  =  "SELECT code,name FROM icd10  where name like '%" . $_POST['searchNameIcd10'] . "%' ";
    }
    $queryIcd10 = mysqli_query($objconnectRefer, $searchIcd10);
    $countIcd10 = mysqli_num_rows($queryIcd10);
    if ($countIcd10 > 0) {
        while ($fetchIcd10 = mysqli_fetch_array($queryIcd10)) {
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
    global $objconnectRefer;
    $selectAdmin = "SELECT * FROM user_login WHERE user_name = '" . $admin . "' and user_password = '" . $pass . "' and status='true'";
    $queryAdmin = mysqli_query($objconnectRefer, $selectAdmin);
    $countAdmin = mysqli_num_rows($queryAdmin);
    if ($countAdmin == 0)
        $rsHos = array('status' => false);
    while ($fetchAdmin = mysqli_fetch_array($queryAdmin)) {
        $rsHos = array('status' => true, 'dataRes' => $fetchAdmin);
    }
    echo json_encode($rsHos);
}

function GetTableUser()
{
    global $objconnectRefer;
    $sql = "SELECT * FROM  user_login ";
    $queryUser = mysqli_query($objconnectRefer, $sql);
    $rsHos = array();
    while ($fetchDoctor = mysqli_fetch_array($queryUser)) {
        $rsHos[] = array('status' => true, $fetchDoctor);
    }
    echo json_encode($rsHos);
}

function AddUser()
{
    global $objconnectRefer;
    $countAuthRefer = count($_POST["authRefer"]);
    $arrayAuthRefer = [];
    $countAuthRefer;
    for ($i = 0; $i < $countAuthRefer; $i++) {
        array_push($arrayAuthRefer, $_POST["authRefer"][$i]);
    }

    $insertAddUser = "INSERT INTO user_login(user_name,user_password,name_user,section_detail,tel,auth_refer,status)
     VALUES('" . $_POST['username'] . "','" . $_POST['userpassword'] . "','" . $_POST['myName'] . "','" . $_POST['lcationDetail'] . "','" . $_POST['userTel'] . "','" . json_encode($arrayAuthRefer) . "','" . $_POST['status'] . "')";
    $status =  mysqli_query($objconnectRefer, $insertAddUser);
    if ($status == 1) {
        $arr[] = array('status' => true, 'status' => $status);
    } else {
        $arr[] = array('status' => false, 'status' => $status);
    }
    echo json_encode($arr);
}

function EditUser()
{
    global $objconnectRefer;
    if ($_POST['source'] == "userName") {
        $sql = "UPDATE user_login SET  user_name ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "userPassWord") {
        $sql = "UPDATE user_login SET  user_password ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "nameUser") {
        $sql = "UPDATE user_login SET  name_user ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "sectionDetail") {
        $sql = "UPDATE user_login SET  section_detail ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "tel") {
        $sql = "UPDATE user_login SET  tel ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "authRefer") {
        $sql = "UPDATE user_login SET  auth_refer ='" . json_encode($_POST['resultEditUser']) . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "status") {
        $sql = "UPDATE user_login SET  status ='" . $_POST['resultEditUser'] . "' WHERE id ='" . $_POST['id'] . "'";
    } else if ($_POST['source'] == "del") {
        $sql = "DELETE user_login WHERE id ='" . $_POST['id'] . "'";
    }
    $status =  mysqli_query($objconnectRefer, $sql);
    if ($status == 1) {
        $arr[] = array('status' => true, 'status' => $status);
    } else {
        $arr[] = array('status' => false, 'status' => $status);
    }
    echo json_encode($arr);
}


function GetTableDoctor()
{
    global $objconnectRefer;
    $selectDoctor = "SELECT doctor_id,doctor_name,doctor_status FROM doctor";
    $queryDoctor = mysqli_query($objconnectRefer, $selectDoctor);
    $rsHos = array();
    while ($fetchDoctor = mysqli_fetch_array($queryDoctor)) {
        $rsHos[] = array('status' => true, "id" => $fetchDoctor['doctor_id'], 'Name' => $fetchDoctor['doctor_name'], 'StatusDoctor' => $fetchDoctor['doctor_status']);
    }
    echo json_encode($rsHos);
}

// ?? AddDoctor
function AddDortor($post)
{
    global $objconnectRefer;
    $insertAddDoctor = "INSERT INTO doctor (doctor_name,doctor_status,doctor_tel) VALUES('" . $post['namedoctor'] . " " . $post['lastnamedoctor'] . "', '" . $post['status'] . "','" . $post['telDoctor'] . "' )";
    $status = mysqli_query($objconnectRefer, $insertAddDoctor);
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
    global $objconnectRefer;

    if ($souce == "doctorNameEdit") {
        $Update = "SET doctor_name ='" . $value . "' WHERE doctor_id ='" . $id . "'";
        $upDateDoctor = "UPDATE doctor $Update ";
    } else if ($souce == "status") {
        $Update = "SET doctor_status = '" . $value . "' WHERE doctor_id ='" . $id . "'";
        $upDateDoctor = "UPDATE doctor $Update ";
    } else {
        $upDateDoctor = "DELETE FROM doctor   WHERE doctor_id ='" . $id . "'";
    }
    $status =  mysqli_query($objconnectRefer, $upDateDoctor);
    if ($status == 1) {
        $arr[] = array('status' => true, 'status' => $status);
    } else {
        $arr[] = array('status' => false, 'status' => $status);
    }
    echo json_encode($arr);
}

function ModalDerivery()
{
    global $objconnectRefer;
    $selectModalDerivery = "SELECT * FROM derivery_service_refer ";
    $queryModalDerivery = mysqli_query($objconnectRefer, $selectModalDerivery);
    $rsModalDerivery = array();
    while ($fetchDeriver = mysqli_fetch_array($queryModalDerivery)) {
        $rsHos[] = array('status' => true, "id" => $fetchDeriver['id_service'], 'Name' => $fetchDeriver['name_service'], 'StatusDoctor' => $fetchDeriver['status_service']);
    }
    echo json_encode($rsHos);
}

function tableStation()
{
    global $objconnectRefer;
    $selectStation = "SELECT * FROM station";
    $queryStation = mysqli_query($objconnectRefer, $selectStation);
    $rsStation = array();
    while ($fetchStation = mysqli_fetch_array($queryStation)) {
        $rsStation[] = array('status' => true, "data" => $fetchStation);
    }
    echo json_encode($rsStation);
}

function AddStationRefer()
{
    global $objconnectRefer;
    $sql = "INSERT INTO station (station_name) value('" . $_POST['station'] . "') ";
    $queryStation = mysqli_query($objconnectRefer, $sql);
    $stationArr = array();
    if ($queryStation == 1) {
        $sqlSelectStation = "SELECT * FROM station";
        $querySelectStation = mysqli_query($objconnectRefer, $sqlSelectStation);
        while ($fetchStation = mysqli_fetch_array($querySelectStation)) {
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
    global $objconnectRefer;
    if ($_POST['stationSource'] == "del") {
        $sqlStation = "DELETE FROM station WHERE station_id='" . $_POST['stationId'] . "'";
        mysqli_query($objconnectRefer, $sqlStation);
    } else if ($_POST['stationSource'] == "stationName") {
        $sqlEditStation = "UPDATE station SET station_name ='" . $_POST['stationValue'] . "'  WHERE station_id ='" . $_POST['stationId'] . "' ";
        mysqli_query($objconnectRefer, $sqlEditStation);
    }

    $sqlSelectStation = "SELECT * FROM station";
    $querySelectStation = mysqli_query($objconnectRefer, $sqlSelectStation);
    while ($fetchStation = mysqli_fetch_array($querySelectStation)) {
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
    global $objconnectRefer;
    $sql = "SELECT * FROM department ORDER BY dep_id DESC";
    $query = mysqli_query($objconnectRefer, $sql);
    if ($query) {
        while ($rowDepartment = mysqli_fetch_array($query)) {
            $rsDepartment[] = array('status' => true, "id" => $rowDepartment["dep_id"], "name" => $rowDepartment["dep_name"]);
        }
    } else {
        $rsDepartment[] = array('status' => false);
    }


    echo json_encode($rsDepartment);
}

function AddDepartment()
{
    global $objconnectRefer;
    $sql = "INSERT INTO department (dep_name) value('" . $_POST["nameDeapartMent"] . "')";
    $query = mysqli_query($objconnectRefer, $sql);
    if ($query)
        echo json_encode($query);
}
function EditDelDepartment()
{
    global $objconnectRefer;
    if ($_POST['departmentSource'] == "del") {
        $sqlStation = "DELETE FROM department WHERE dep_id='" . $_POST['departmentId'] . "'";
        $fetchVale =  mysqli_query($objconnectRefer, $sqlStation);
        if ($fetchVale) $rs[] = array("status" => true, $fetchVale);
    } else if ($_POST['departmentSource'] == "departmentName") {
        $sqlEditStation = "UPDATE department SET dep_name ='" . $_POST['departmentValue'] . "' WHERE dep_id ='" . $_POST['departmentId'] . "' ";
        $fetchVale = mysqli_query($objconnectRefer, $sqlEditStation);
        if ($fetchVale) $rs[] = array("status" => true, $fetchVale);
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
