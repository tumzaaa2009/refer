<?php
$json = file_get_contents('../../../sysconfig/sysconfig.json');
$jsonData = json_decode($json,true);
$countRwController=  count($jsonData);
global $objconnectRefer  , $objconnectHis;
 $dbTypeHis ='';
$dbTypeRefer='';
$dbNameRefer ='';
$passRefer ='';
$userRefer  ='';
$serverRefer  ='';
$hisType='';
$serverHis='';
$dbNameHis='';
$userHis='';
$passHis='';
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
if($countRwController > 0) {        
 
              if($jsonData[0]['ContentTypeRefer'] == "refer"){ 
                $contentTypeRefer = $jsonData[0]['ContentTypeRefer'];         
                $dbTypeRefer = $jsonData[0]['DB_TYPE_REFER'] ; 
                $serverRefer = $jsonData[0]['Server_NameRefer'] ;
                $userRefer   = $jsonData[0]['userRefer'] ;
                $passRefer   = decryptPassword($jsonData[0]['Password']) ;
                $dbNameRefer = $jsonData[0]['Database_NameRefer'] ;
                $portRefer   = $jsonData[0]['portRefer'];
              }
              if($jsonData[1]['ContentTypeHis'] == "his"){ 
                $dbTypeHis = $jsonData[1]['DB_TYPE_HIS'] ;  
                $contentTypeHis = $jsonData[1]['ContentTypeHis'];
                $typeHis =    $jsonData[1]['Type_His'];
                $serverHis  = $jsonData[1]['Server_NameHis']  ; 
                $userHis    = $jsonData[1]['useHis'] ;
                $passHis    = decryptPassword($jsonData[1]['Password']) ;
                $dbNameHis  = $jsonData[1]['Database_NameHis'] ;
                $portHis = $jsonData[1]['portHis'];
                }
             
                }
        else if($_POST['contentTypeRefer']=="refer"){
                
                $contentTypeRefer = $_POST['contentTypeRefer'];
                $dbTypeRefer =$_POST['dbTypeRefer'] ; 
                $serverRefer =$_POST['serverNameRefer'] ;
                $userRefer   =$_POST['userNameRefer'] ;
                $passRefer   = decryptPassword($_POST['passwordRefer']) ;
                $dbNameRefer =$_POST['databaseNameUseRefer'] ;
                $portRefer = $_POST['portRefer'];
               
             
         }else if ($_POST['contentTypeHis']=="his"){
            
                $contentTypeHis = $_POST['contentTypeHis'];
                $dbTypeHis = $_POST['dbTypeHis'];  
                $hisType = $_POST['hisType'];
                $serverHis = $_POST['serverNameHis']; 
                $userHis   = $_POST['userNameHis'];
                $passHis   = decryptPassword($_POST['passwordHis']);
                $dbNameHis = $_POST['databaseNameUseHis'];
                $portHis = $_POST['portHis'];
         } 
 
 

?>