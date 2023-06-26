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

if($countRwController > 0) {        
 
              if($jsonData[0]['ContentTypeRefer'] == "refer"){ 
                $contentTypeRefer = $jsonData[0]['ContentTypeRefer'];         
                $dbTypeRefer = $jsonData[0]['DB_TYPE_REFER'] ; 
                $serverRefer = $jsonData[0]['Server_NameRefer'] ;
                $userRefer   = $jsonData[0]['userRefer'] ;
                $passRefer   = $jsonData[0]['Password'] ;
                $dbNameRefer = $jsonData[0]['Database_NameRefer'] ;
                $portRefer   = $jsonData[0]['portRefer'];
              }
              if($jsonData[1]['ContentTypeHis'] == "his"){ 
                $dbTypeHis = $jsonData[1]['DB_TYPE_HIS'] ;  
                $contentTypeHis = $jsonData[1]['ContentTypeHis'];
                $typeHis =    $jsonData[1]['Type_His'];
                $serverHis  = $jsonData[1]['Server_NameHis']  ; 
                $userHis    = $jsonData[1]['useHis'] ;
                $passHis    = $jsonData[1]['Password'] ;
                $dbNameHis  = $jsonData[1]['Database_NameHis'] ;
                $portHis = $jsonData[1]['portHis'];
                }
             
                }
        else if($_POST['contentTypeRefer']=="refer"){
                
                $contentTypeRefer = $_POST['contentTypeRefer'];
                $dbTypeRefer =$_POST['dbTypeRefer'] ; 
                $serverRefer =$_POST['serverNameRefer'] ;
                $userRefer   =$_POST['userNameRefer'] ;
                $passRefer   =$_POST['passwordRefer'] ;
                $dbNameRefer =$_POST['databaseNameUseRefer'] ;
                $portRefer = $_POST['portRefer'];
               
             
         }else if ($_POST['contentTypeHis']=="his"){
            
                $contentTypeHis = $_POST['contentTypeHis'];
                $dbTypeHis = $_POST['dbTypeHis'];  
                $hisType = $_POST['hisType'];
                $serverHis = $_POST['serverNameHis']; 
                $userHis   = $_POST['userNameHis'];
                $passHis   = $_POST['passwordHis'];
                $dbNameHis = $_POST['databaseNameUseHis'];
                $portHis = $_POST['portHis'];
         } 
   
      //   if($dbTypeRefer == "MYSQL" &&  $contentTypeRefer =="refer"  ){
         
      //           $objconnectRefer = mysqli_connect($serverRefer,$userRefer,$passRefer,$dbNameRefer);
      //            date_default_timezone_set('Asia/Bangkok');  
      //            $arr["status"] = "Connecting Suscess " ;
      //            mysqli_query($objconnectRefer,"SET CHARACTER SET UTF8");
      //           if (mysqli_connect_errno()) {
      //                  $statusError = "Failed to connect to MySQL: " . mysqli_connect_error();
      //                  $arr["status"] = $statusError;
      //                         echo json_encode($arr);
      //                   exit();
      //                 }
      //                       if($_POST['contentTypeRefer']){  echo json_encode($arr);
      //                    }
      //   }
      //  else if(  $dbTypeHis =="MYSQL" &&   $contentTypeHis =="his"){
      //           $objconnectHis = mysqli_connect($serverHis, $userHis,$passHis ,$dbNameHis) ;
      //           date_default_timezone_set('Asia/Bangkok');  
      //           $arr["status"] = "Connecting Suscess ".$contentType;
      //             mysqli_query($objconnectHis,"SET CHARACTER SET UTF8");
      //           if (mysqli_connect_errno()) {
      //                   $statusError = "Failed to connect to MySQL: " . mysqli_connect_error();
      //                   $arr["status"] = $statusError;
      //                          echo json_encode($arr);
      //                    exit();
      //                  }
      //            if($_POST['contentTypeHis']){ echo json_encode($arr);   }
             
      //    }else if ($dbTypeHis =="SQLSERVER" && $contentType=="his"){
      //         $arr["status"] = "ระบบยังไม่รองรับ";
      //         echo json_encode($arr);
      //         //     $serverName = "164.115.43.33,1433";
      //         //                   $userName = "sa";
      //         //                   $userPassword = "qwER1234!@#$";
      //         //                   $dbName = "referdb_dw";

      //         //                   $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true, "CharacterSet" => 'UTF-8');

      //         //                   $conn = sqlsrv_connect($serverName, $connectionInfo);

      //         //                   if( $conn === false ) {
      //         //                   die( print_r( sqlsrv_errors(), true));
      //         //                   }else{
      //         //                   $arr["status"] = "dasasd";
      //         //                  echo json_encode($arr);   
      //         //                   return $conn;
      //         //                   }                  

      //           }

 

?>