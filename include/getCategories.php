<?php
$restype = $_GET['restype'];
$client  = $_GET['client'];

if(empty($client)) {
    die("Client is missing");
    return false;
};

if(empty($restype)) {
    die("Resource Type is missing");
    return false;
};


if(stripos($client, " ") > 0){
    $client = strstr($client, " ", true);
}

if(stripos($restype, " ") > 0){
    $restype = strstr($restype, " ", true);    
} 


if(strtolower($restype) == 'design') $restype = 'designs';

//$url = 'https://templates.templet.io/'.strtolower($client).'/templates.json';
$url = 'https://templates.templet.io/'.strtolower($client).'/'.strtolower($client).'.json';

$data = @file_get_contents($url);
$templates = json_decode($data);

if($templates){

    $categories = array();
    foreach ($templates as $key => $file) {
       
        if(strtolower($restype) == strtolower($file->restype))
        {
            $categories[] = array(
                'value'    => str_replace(' ', '_', strtolower($file->category)),
                'category' => $file->category
            );
        };
        
    };

    $tempArr = array_unique(array_column($categories, 'value'));
    $categories = array_intersect_key($categories, $tempArr); 

    $aux = array();

    //Order Alpha
    foreach ($categories as $key => $row) {
        $aux[$key] = $row['category'];
    }
    array_multisort($aux, SORT_ASC, $categories);

    echo json_encode($categories);

};

