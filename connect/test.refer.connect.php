<?php
$dbTypeHis = '';
$dbTypeRefer = '';
$dbNameRefer = '';
$passRefer = '';
$userRefer  = '';
$serverRefer  = '';
$hisType = '';
$serverHis = '';
$dbNameHis = '';
$userHis = '';
$passHis = '';
$contentTypeRefer = '';
$contentTypeHis = '';
$callPathRefer = '';
$callPathHis = '';
$portRefer = '';
$PortHis = '';

if (isset($_POST['contentTypeRefer'])) {
       if ($_POST['contentTypeRefer'] == "refer") {
              $contentTypeRefer = $_POST['contentTypeRefer'];
              $dbTypeRefer = $_POST['dbTypeRefer'];
              $serverRefer = $_POST['serverNameRefer'];
              $userRefer   = $_POST['userNameRefer'];
              $passRefer   = $_POST['passwordRefer'];
              $dbNameRefer = $_POST['databaseNameUseRefer'];
              $portRefer = $_POST['portRefer'];
       }
}
if (isset($_POST['contentTypeHis'])) {
       if ($_POST['contentTypeHis'] == "his") {
              $contentTypeHis = $_POST['contentTypeHis'];
              $dbTypeHis = $_POST['dbTypeHis'];
              $hisType = $_POST['hisType'];
              $serverHis = $_POST['serverNameHis'];
              $userHis   = $_POST['userNameHis'];
              $passHis   = $_POST['passwordHis'];
              $dbNameHis = $_POST['databaseNameUseHis'];
              $portHis = $_POST['portHis'];
       }
}
if ($dbTypeRefer == "Mysql" &&  $contentTypeRefer == "refer") {
       $objconnectRefer = mysqli_connect($serverRefer, $userRefer, $passRefer, $dbNameRefer);
       date_default_timezone_set('Asia/Bangkok');
       $arr["status"] = "Connecting Success =". $contentTypeRefer;

       if (!$objconnectRefer) {
              $statusError = "Failed to connect to MySQL: " . mysqli_connect_error();
              $arr["status"] = $statusError;
              echo json_encode($arr);
              exit();
       }

       $query = mysqli_query($objconnectRefer, "SET CHARACTER SET UTF8");

       if (!$query) {
              $statusError = "Error in executing query: " . mysqli_error($objconnectRefer);
              $arr["status"] = $statusError;
              echo json_encode($arr);
              exit();
       }

       echo json_encode($arr);

}
if ($dbTypeHis == "Mysql" &&   $contentTypeHis == "his") {

       $objconnectHis = mysqli_connect($serverHis, $userHis, $passHis, $dbNameHis);
       date_default_timezone_set('Asia/Bangkok');
       $arr["status"] = "Connecting Suscess " . $contentTypeHis;
       mysqli_query($objconnectHis, "SET CHARACTER SET UTF8");
       if (!$objconnectHis) {
              $statusError = "Failed to connect to MySQL: " . mysqli_connect_error();
              $arr["status"] = $statusError;
              echo json_encode($arr);
              exit();
       }

       $query = mysqli_query($objconnectHis, "SET CHARACTER SET UTF8");

       if (!$query) {
              $statusError = "Error in executing query: " . mysqli_error($objconnectHis);
              $arr["status"] = $statusError;
              echo json_encode($arr);
              exit();
       }

       echo json_encode($arr);


} 
else if ($dbTypeHis == "SQLSERVER" && $contentType == "his") {
       $arr["status"] = "ระบบยังไม่รองรับ";
       echo json_encode($arr);
}
