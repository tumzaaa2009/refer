<?php 
  
  if($_POST['hosCode'] && $_POST['hosName']) {
    $arrayHos = array(
       "hosCode" => array(
            "hosCode" =>  $_POST['hosCode']  ,
            "hosName" => $_POST['hosName'], 
        )
    );
  }
    if($_POST['connect-type']=="refer"){
                 //?? array refer
                    $typeDb = $_POST['selec-typedb-thairefer'];
                    $serverName =$_POST['server-name-thairefer'];
                    $databaseName = $_POST['database-name-thairefer'];
                    $useRefer = $_POST['use-id-thairefer'];
                    $password = $_POST['user-password-thairefer'] ;
                    $contentType = $_POST['connect-type'];
                    $portRefer = $_POST['portRefer'];
                // array
                    $array = Array (
                    "0" => Array (
                    "ContentTypeRefer"=>$contentType,
                    "DB_TYPE_REFER" => $typeDb,
                    "Server_NameRefer" => $serverName,
                    "Database_NameRefer" => $databaseName,
                    "userRefer" =>$useRefer,
                    "Password" => $password,
                    "portRefer" =>$portRefer,
                    "callPathRefer" => "./api/Refer/". $typeDb."/". $databaseName.".". $typeDb.".php" 
                    )  );
                //?? array hos 
                        $contentTypeHis = $_POST['connect-type-his'];
                        $typeDbHos = $_POST['select-typedb-his'];
                        $typeHis = $_POST['select-type-his'];
                        $serverNameHis = $_POST['sever-name-his'];
                        $databaseNameHis =$_POST['database-name-his'];
                        $useHis = $_POST['use-id-his'];
                        $usePassHis = $_POST['user-password-his'];
                        $portHis = $_POST['portHis'];
                    $hisArray = Array (
                        "1" => Array (
                        "ContentTypeHis" =>$contentTypeHis,
                        "DB_TYPE_HIS" => $typeDbHos,
                        "Type_His" => $typeHis ,
                        "Server_NameHis" => $serverNameHis,
                        "Database_NameHis" => $databaseNameHis,
                        "useHis" => $useHis,
                        "Password"=> $usePassHis,
                        "portHis"=>$portHis,
                        "callPathHis" => "./api/HosApi/" . $typeDbHos . "/".$typeHis. "." . $typeDbHos . ".php"
                        )  );
      
                        
                  $json = json_encode(array_merge($arrayHos,$array,$hisArray));
                    
            if (file_put_contents("../sysconfig/sysconfig.json", $json));
                            $arr['stauts'] ='true' ; 

                            echo json_encode($arr);
        
        }
    
?>