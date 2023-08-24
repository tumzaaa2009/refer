<?php
function encryptPassword($password)
{
  $key = openssl_random_pseudo_bytes(32); // สร้างคีย์สุ่ม
  $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); // สร้าง IV สุ่ม

  $encrypted = openssl_encrypt($password, 'aes-256-cbc', $key, 0, $iv);

  return base64_encode($key . $iv . $encrypted);
}

if ($_POST['hosCode'] && $_POST['hosName']) {
  $arrayHos = array(
    "hosCode" => array(
      "hosCode" =>  $_POST['hosCode'],
      "hosName" => $_POST['hosName'],
    )
  );
}
if ($_POST['connect-type'] == "refer") {
  //?? array refer
  $typeDb = $_POST['selec-typedb-thairefer'];
  $serverName = $_POST['server-name-thairefer'];
  $databaseName = $_POST['database-name-thairefer'];
  $useRefer = $_POST['use-id-thairefer'];
  $password = encryptPassword($_POST['user-password-thairefer']);
  $contentType = $_POST['connect-type'];
  $portRefer = $_POST['portRefer'];
  // array
  $array = array(
    "0" => array(
      "ContentTypeRefer" => $contentType,
      "DB_TYPE_REFER" => $typeDb,
      "Server_NameRefer" => $serverName,
      "Database_NameRefer" => $databaseName,
      "userRefer" => $useRefer,
      "Password" => $password,
      "portRefer" => $portRefer,
      "callPathRefer" => "./api/Refer/" . $typeDb . "/" . $databaseName . "." . $typeDb . ".php"
    )
  );
  //?? array hos 
  $contentTypeHis = $_POST['connect-type-his'];
  $typeDbHos = $_POST['select-typedb-his'];
  if ($_POST['select-type-connect'] == "ConnectToDb") {
    $typeHis = $_POST['select-type-his'];
    $serverNameHis = $_POST['sever-name-his'];
    $databaseNameHis = $_POST['database-name-his'];
    $useHis = $_POST['use-id-his'];
    $usePassHis = encryptPassword($_POST['user-password-his']);
    $portHis = $_POST['portHis'];
 
    $hisArray = array(
      "1" => array(
        "typeConnect" => $_POST['select-type-connect'],
        "ContentTypeHis" => $contentTypeHis,
        "DB_TYPE_HIS" => $typeDbHos,
        "Type_His" => $typeHis,
        "Server_NameHis" => $serverNameHis,
        "Database_NameHis" => $databaseNameHis,
        "useHis" => $useHis,
        "Password" => $usePassHis,
        "portHis" => $portHis,
        "callPathHis" => "./api/HosApi/" . $typeDbHos . "/" . $typeHis . "." . $typeDbHos . ".php"
      )
    );
  } else if ($_POST['select-type-connect']  == "ConnectToAPI") {
    $headAuth = $_POST['head-auth-his'];
    $hospCode = $_POST['key-hopscode-his'];
    $urlTokenHis = $_POST['url-token-his'];
    $testConnect = $_POST['url-token-testconnect'];
    $endPoint =$_POST['url-end-point'];
    $token = encryptPassword($_POST['key-token-his']);
    
    $hisArray = array(
      "1" => array(
        "typeConnect" => $_POST['select-type-connect'],
        "ContentTypeHis" => $contentTypeHis,
        "URl" => $urlTokenHis,
        "testconnect"=>$testConnect,
        "endPoint"=>$endPoint,
        "Auth"=>$headAuth,
        "hospCode"=> $hospCode,
        "TOKEN" => $token
      )
    );
  }

  $json = json_encode(array_merge($arrayHos, $array , $hisArray));

  if ($json === false) {
    $arr['status'] = 'error';
    $arr['message'] = 'JSON encoding failed: ' . json_last_error_msg();
  } else {
    if (file_put_contents("../sysconfig/sysconfig.json", $json)) {
      $arr['status'] = 'true';
    } else {
      $arr['status'] = 'error';
      $arr['message'] = 'Failed to write to sysconfig.json';
    }
  }

  echo json_encode($arr);
}
