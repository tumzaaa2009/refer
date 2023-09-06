<?php
function decryptPassword($encryptedPassword)
{
  $data = base64_decode($encryptedPassword);
  $key = substr(
    $data,
    0,
    32
  );
  $iv = substr($data, 32, openssl_cipher_iv_length('aes-256-cbc'));
  $encrypted = substr($data, 32 + openssl_cipher_iv_length('aes-256-cbc'));
  return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}
$json = file_get_contents('./sysconfig/sysconfig.json');
$jsonData = json_decode($json, true);
$countRwController = 0;
if (isset($jsonData)) {
  if (json_encode($jsonData) == null) {
    $countRwController = 0;
  } else {
    $countRwController =  count($jsonData);
  }
}
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
$hosCode =  $jsonData["hosCode"]["hosCode"];
$hosName =  $jsonData["hosCode"]["hosName"];
if ($countRwController > 0) {
  if ($jsonData[0]['ContentTypeRefer'] == "refer") {
    $contentTypeRefer = $jsonData[0]['ContentTypeRefer'];
    $dbTypeRefer = $jsonData[0]['DB_TYPE_REFER'];
    $serverRefer = $jsonData[0]['Server_NameRefer'];
    $userRefer   = $jsonData[0]['userRefer'];
    $passRefer   = $jsonData[0]['Password'];
    $dbNameRefer = $jsonData[0]['Database_NameRefer'];
    $portRefer   = $jsonData[0]['portRefer'];
    $callPathRefer = $jsonData[0]['callPathRefer'];
  }
  if ($jsonData[1]['ContentTypeHis'] == "his") {
    $typeConnect =  $jsonData[1]['typeConnect'];
    if ($jsonData[1]['typeConnect'] == "ConnectToDb") {
      $dbTypeHis = $jsonData[1]['DB_TYPE_HIS'];
      $contentTypeHis = $jsonData[1]['ContentTypeHis'];
      $typeHis =    $jsonData[1]['Type_His'];
      $serverHis  = $jsonData[1]['Server_NameHis'];
      $userHis    = $jsonData[1]['useHis'];
      $passHis    = $jsonData[1]['Password'];
      $dbNameHis  = $jsonData[1]['Database_NameHis'];
      $portHis = $jsonData[1]['portHis'];
      $callPathHis = $jsonData[1]['callPathHis'];
    } else if ($jsonData[1]['typeConnect'] == "ConnectToAPI") {


      $calAuth = $jsonData[1]['Auth'];
      $calToken = $jsonData[1]['TOKEN'];
      $hospCode = $jsonData[1]['hospCode'];
      $testconnect = $jsonData[1]['testconnect'];
      $callUrl = $jsonData[1]['URl']; //refer api 
      $endPoint = $jsonData[1]['endPoint']; // patien
      $vsDate = $jsonData[1]['visitDate'];
      $labDetail =   $jsonData[1]['visitLabs'];
      $drugDetail = $jsonData[1]['visitDrug'];
  
    }
  }
} else if (isset($_POST['contentTypeRefer'])) {
  if ($_POST['contentTypeRefer'] == "refer") {
    $contentTypeRefer = $_POST['contentTypeRefer'];
    $dbTypeRefer = $_POST['dbTypeRefer'];
    $serverRefer = $_POST['serverNameRefer'];
    $userRefer   = $_POST['userNameRefer'];
    $passRefer   = $_POST['passwordRefer'];
    $dbNameRefer = $_POST['databaseNameUseRefer'];
    $portRefer = $_POST['portRefer'];
  }
} else if (isset($_POST['contentTypeHis'])) {
  if ($_POST['contetTypeHis'] == "his") {
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
if ($dbTypeRefer == "MYSQL" &&  $contentTypeRefer == "refer") {
  $objconnectRefer = mysqli_connect($serverRefer, $userRefer, $passRefer, $dbNameRefer);
  date_default_timezone_set('Asia/Bangkok');
  $arr["status"] = "Connecting Suscess ";
  mysqli_query($objconnectRefer, "SET CHARACTER SET UTF8");
  if (mysqli_connect_errno()) {
    $statusError = "Failed to connect to MySQL: " . mysqli_connect_error();
    $arr["status"] = $statusError;
    echo json_encode($arr);
    exit();
  }
  if ($_POST['contentTypeRefer']) {
    echo json_encode($arr);
  }
} else if ($dbTypeHis == "MYSQL" &&   $contentTypeHis == "his") {
  $objconnectHis = mysqli_connect($serverHis, $userHis, $passHis, $dbNameHis);
  date_default_timezone_set('Asia/Bangkok');
  $arr["status"] = "Connecting Suscess " . $contentType;
  mysqli_query($objconnectHis, "SET CHARACTER SET UTF8");
  if (mysqli_connect_errno()) {
    $statusError = "Failed to connect to MySQL: " . mysqli_connect_error();
    $arr["status"] = $statusError;
    echo json_encode($arr);
    exit();
  }
  if ($_POST['contentTypeHis']) {
    echo json_encode($arr);
  }
}
