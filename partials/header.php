<?php
/*
?TaskID=1204990080185694
&RequestID=7baf9951-4c1b-ee11-8f6e-002248081d31
&TemplateName=Calculators - Basic
&Task Name=Gov and Retail Vertical - Sell Sheet - Complete
&Asignee=adrian@templet.io
&Initiative=FRONTIER - PRODUCTS - Ethernet
&Sources folder=https://templetllc-my.sharepoint.com/:f:/g/personal/daniel_templetllc_onmicrosoft_com/Es0slKogl65Kgj7eNtU4URoBx_TKQpOWnF2ZJIGFKuZtBA?e=ogMudp
&Workfiles folder=https://templetllc-my.sharepoint.com/:f:/g/personal/daniel_templetllc_onmicrosoft_com/Eu9k5YoZmfpGqE5tcsMgfeQBVeRqyR0EsCYR-r4vTIjghw?e=VFBCBl
&Preview folder=https://templetllc-my.sharepoint.com/:f:/g/personal/daniel_templetllc_onmicrosoft_com/EtRa1ZFXH8dKkQHTsoDJXJAB2FeFnKoFmQ803POF3TlITg?e=HetBnq
&Deliverable folder=https://templetllc-my.sharepoint.com/:f:/g/personal/daniel_templetllc_onmicrosoft_com/ErsFd0TyRhhMri6dnvJbPz0BMwA5GnSM_yShEGvLld_b2A?e=mOUXrw

?task_id=1207447662521561&request_id=05de1d63-a31e-ef11-840a-000d3a37bb95&template_name=Design%20Pieces%20-%20Social%20Media%20Static%20Posts&task_name=Post%20-%20Design&asignee=j.acevedo%40templet.io&asignee_name=Javier%20Acevedo%20Da%20Silva&initiative=LIBERTY%20NETWORKS%20-%20INITIATIVES%20-%20Dashboards&sources=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMQSFCDQGS6DAJBLYECAJS2QFBHK&workfiles=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMQZGDHX3N2EAFB3CQNYIGA7YUNF&preview=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMXG7ML7EXS5ANFKEEETBB4BNE44&deliverables=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMQCC3RROSEKFFAJ5PKKI2OEEKJS

?task_id=1206780877598909&request_id=64880d03-0ddc-ee11-904d-002248081d31&template_name=Websites%20-%20Dashboard&task_name=Website%20Texts%20-%20Structure%20and%20Writeup&asignee=j.acevedo%40templet.io&asignee_name=Javier%20Acevedo%20Da%20Silva&initiative=LIBERTY%20NETWORKS%20-%20INITIATIVES%20-%20Dashboards&sources=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMV7YM47UIXHMRFJ2YKPR2DZBLB3&workfiles=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMRPHXBEBFVLQREKPPUERHHIXSYO&preview=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMXVIWQOMFTVGNAIR4KVNAS2MESL&deliverables=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMQ2LIDUE7ERJNAYS5Z53M3VUJ6J

//Excel
https://templetllc-my.sharepoint.com/:x:/r/personal/daniel_templetllc_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7BF9141218-F687-48F5-A982-6106A247688D%7D&file=Consolidated%20-%20Template%20list.xlsx&action=default&mobileredirect=true&clickparams=eyJBcHBOYW1lIjoiVGVhbXMtRGVza3RvcCIsIkFwcFZlcnNpb24iOiIyOC8yMzA3MDMwNzM0NiIsIkhhc0ZlZGVyYXRlZFVzZXIiOmZhbHNlfQ%3D%3D&wdOrigin=TEAMS-ELECTRON.p2p_ns.bim&wdExp=TEAMS-CONTROL&wdhostclicktime=1708005886531&web=1


https://templetllc-my.sharepoint.com/:f:/g/personal/daniel_templetllc_onmicrosoft_com/EhIohwNLwwJCvBBATLUChOoBtLLu6Vy-1gQFLVIHoj6SKw?e=YaMQDs
*/

//Get Values
$taskId = @$_GET['task_id'];
$requestId = @$_GET['request_id'];
$templateName = @$_GET['template_name'];
$taskName = @$_GET['task_name'];
$asignee = @$_GET['asignee'];
$asigneeName = @$_GET['asignee_name'];
$initiative = @$_GET['initiative'];
$source_folder = @$_GET['sources'];
$workfiles_folder = @$_GET['workfiles'];
$preview_folder = @$_GET['preview'];
$deliverable_folder = @$_GET['deliverables'];
$child_task = @$_GET['child_task'];

$validAccess = 1;

//Validate empty field
if(empty($taskId) || 
    empty($requestId) || 
    empty($templateName) || 
    empty($asignee) ||
    empty($asigneeName) || 
    empty($initiative)) {
    // || 
    // empty($source_folder) || 
    // empty($workfiles_folder) || 
    // empty($preview_folder) || 
    // empty($deliverable_folder)) 
        $validAccess = 0;

    };

//Search data
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://prod-67.westus.logic.azure.com:443/workflows/6c87805abcaa46648914b3a3069d22bd/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=5s2mTI49gEPVzxoP6ls_q-fgjWW1EIRFqAngojq5no4',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => array('Content-length: 0')
));

$response = curl_exec($curl);

curl_close($curl);
$templates = json_decode($response, true);
$haveOutput = $haveForm = false;
$restype = $output = $phase = "";

//Find Output
if($validAccess > 0){
    foreach($templates['value'] as $template){
        $_templateName = @$template['_cr220_contenttemplate_value@OData.Community.Display.V1.FormattedValue'];
        $_taskName = $template['cr220_taskname'];

        if($_templateName == $templateName){
            if($_taskName == $taskName){
                echo "<pre>";
                print_r($template);
                echo "</pre>";

                $haveOutput = true;
                $restype = strtolower($template['cr220_restype']);
                $restype_cr220 = $template['cr220_restype'];
                $output = $template['cr220_output'];
                $destination = $template['cr220_destinationfolder'];
                $phase = $template['cr220_phase'];
                if(empty($destination )){
                    break;
                }
                if(strpos($destination, ",") > 0){
                    $destination = substr($destination, 0, strpos($destination, ","));    
                }
                
                $output = str_replace(" ", "_", $output);
                $restype = str_replace(" ", "_", $restype);

                $path_type = ucwords(strtolower($template['cr220_restype']));
                $client = trim(substr($initiative, 0, strpos($initiative, "-")));
                $path_folder = "01_Sources";

                // /Projects/FRONTIER/FRONTIER - PRODUCTS - Ethernet/Slide Decks/03_Workfiles
                $path = "/Projects/".$client.'/'.$initiative.'/'.$path_type.'/'.$path_folder.'/';

                //Search files by path
                $curl = curl_init();
                $path_array = array(
                                "path" => $path
                            );

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://prod-71.westus.logic.azure.com:443/workflows/fed9ccfeed4b47b98e5b4a488368cd14/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=_TUOk3hOrDcsA16pCCT_WbvFkEvHv2orR1E6iX0cqV0',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($path_array),
                    CURLOPT_HTTPHEADER => array('Content-Type: application/json')
                ));

                $response = curl_exec($curl);
                $files = json_decode($response);
                
                curl_close($curl);
            }

            //break;
        }
    }
};

if(!$haveOutput){
    //echo "We haven't output file";
}


?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Content Manager - Inputs | Templet</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://templet.io/images/favicon.png">

    <!-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css">   
    -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/f8d1b3f92a.js" crossorigin="anonymous"></script>

    <style>
        #browse-file {
            display: none;
        }
      </style>
</head>
<body id="top" data-access="<?=$validAccess?>" data-taskid="<?=$taskId?>" data-templatename="<?=$templateName?>" data-requestid="<?=$requestId?>" data-taskname="<?=$taskName?>" data-path="<?=$path?>" data-restype="<?=$restype_cr220?>" data-output="<?=$output?>" data-phase=<?=$phase?> data-childtask="<?=$child_task?>" data-client="<?=$client?>">
    <?php include('partials/nav.php'); ?>