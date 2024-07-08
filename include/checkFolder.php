<?php

$folder = isset($_GET['folder']) ? $_GET['folder'] : '';
$id = isset($_GET['folderId']) ? $_GET['folderId'] : '';


if(empty($folder)) {
    die("Folder name is missing");
    return false;
}

$url = 'https://templet-uploads.azurewebsites.net/api/checkFolders/?folderId='.$id;

$curl = curl_init();

// echo $url;
// echo "<br>";

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$data = json_decode($response);

//print_r($data);

$values = $data->value;

foreach($values as $value){
    if(strtolower($value->name) == strtolower($folder)){
        echo $value->id;
        exit();
    }
}


