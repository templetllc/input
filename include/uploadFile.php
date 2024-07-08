<?php

if(!isset($_POST)) {
    die("Data is missing");
    return false;
}

 if(!isset($_FILES['fileToUpload']['name'])){
    die("No file found!");
    return false;
}

// Create a CURLFile object
$cfile = curl_file_create($_FILES['fileToUpload']['tmp_name'],$_FILES['fileToUpload']['type'],$_FILES['fileToUpload']['name']);
$folderid = $_POST['folderid'];

$url = 'https://templet-uploads.azurewebsites.net/api/OnedriveUpload/?folderId='.$folderid;

$data = array(
    'fileToUpload' => $cfile
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $data,
));

//$response = curl_exec($curl);

if(curl_exec($curl) === false){
    echo 'Curl error: ' . curl_error($curl);
}else{
    $curlResponse = curl_exec($curl);

    $jsonArrayResponse = json_decode($curlResponse);

    echo $_FILES['fileToUpload']['name'];
}
curl_close($curl);
