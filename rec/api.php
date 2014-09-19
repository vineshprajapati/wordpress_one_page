<?php

//require('/rec.php');
$name = 1;

$service_url = 'http://localhost/rec/rec.php';
       $curl = curl_init($service_url);
       $curl_post_data = array(
            "num" => $name,
            "format" => "json",
            "requestType" => "abc"
            );
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
       print_r($curl_response);die('S');
       curl_close($curl);
?>