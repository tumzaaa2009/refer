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
    $selectWard = "SELECT * FROM department";
    $queryStationWard = mysqli_query($objconnectRefer, $selectWard);
    $stationWard = array();
    while ($rowStationService = mysqli_fetch_array($queryStationWard)) {
        $stationWard[] = $rowStationService;
    }
    $rsWard = array('status' => true, 'response' => $stationWard);
    echo json_encode($rsWard);
}

function pttype(){
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

function HosName(){
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
 



//* เรียกใช้การทำงาน //

if(isset($_POST['servicestation'])){
    StationRefer();
}
 if(isset($_POST['ward'])){
    Ward();
 }
 if(isset($_POST['pttype'])){
    pttype();
 }
 if(isset($_POST['Hosname'])){
    HosName();
 }
//  รับค่าhn 

?>