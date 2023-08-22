<?php
function GetRefer($ListTarget){

        $url = "https://api.srbr.in.th/refer/api/patient/";
    
        $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            $headers = array(
                "Content-Type: application/json;",
                "X-API-Key: pvoNArKhGdKK9oDl@fTSsDjG8XzptHlxIXR!3JRjzUJhDRbkalaWD"
            );

           
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($ListTarget,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp = curl_exec($curl);
            curl_close($curl);
            $data =$resp;
            return $data;
    }

    $ListTarget = array(
     
        "hospcode" => "10661",
        "cid" => "11111111111",
        "hn" => "1015555",
    );

    $temp_json = GetRefer($ListTarget);
   echo json_decode($temp_json, TRUE);


    