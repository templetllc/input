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

?task_id=1204990080185694&request_id=7baf9951-4c1b-ee11-8f6e-002248081d31&template_name=Slide Decks - Company Overview&task_name=Slide Decks Texts - Interview&asignee=adrian@templet.io&asignee_name=Adrian&initiative=FRONTIER - PRODUCTS - Ethernet&sources=Es0slKogl65Kgj7eNtU4URoBx_TKQpOWnF2ZJIGFKuZtBA?e=ogMudp&workfiles=Eu9k5YoZmfpGqE5tcsMgfeQBVeRqyR0EsCYR-r4vTIjghw?e=VFBCBl&preview=EtRa1ZFXH8dKkQHTsoDJXJAB2FeFnKoFmQ803POF3TlITg?e=HetBnq&deliverable=ErsFd0TyRhhMri6dnvJbPz0BMwA5GnSM_yShEGvLld_b2A?e=mOUXrw

?task_id=1204990080185694&request_id=7baf9951-4c1b-ee11-8f6e-002248081d31&template_name=Sheets - Proposal Template&task_name=Slide Decks Texts - Interview&asignee=adrian@templet.io&initiative=FRONTIER - PRODUCTS - Ethernet&sources=Es0slKogl65Kgj7eNtU4URoBx_TKQpOWnF2ZJIGFKuZtBA?e=ogMudp&workfiles=Eu9k5YoZmfpGqE5tcsMgfeQBVeRqyR0EsCYR-r4vTIjghw?e=VFBCBl&preview=EtRa1ZFXH8dKkQHTsoDJXJAB2FeFnKoFmQ803POF3TlITg?e=HetBnq&deliverable=ErsFd0TyRhhMri6dnvJbPz0BMwA5GnSM_yShEGvLld_b2A?e=mOUXrw

?task_id=1205960716548705&request_id=63d4fef9-cc83-ee11-8179-000d3a59d5b3&template_name=Emails%20-%20Announcement&task_name=Announcement%20Emails%20-%20HTML%20Formatting&asignee=1138089670393938&asignee_name=Javier%20Acevedo%20Da%20Silva&initiative=FRONTIER%20-%20PRODUCTS%20-%20Wavelength&sources=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMUWAYJ6GWUXAZDI2U7GEYZKRUMO&workfiles=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMSBH5U3JZQ6NBGZUN2E4TY5JG2R&preview=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMRKNYJIOVO2JJDY4IMAF43ANH3S&deliverables=b!GizpIt4ya0qaDvc_4eZ7SJOqiwKmAxlNiQnx5wrl4pByxvNAM638TYXZURuvD08v.01G3FULMXRMVTGAJIRHBBK7FR64VSA6FIB

https://templetllc-my.sharepoint.com/:f:/g/personal/daniel_templetllc_onmicrosoft_com/EipuEodV2kpHjiGALzYGn3IB_bH_7qeFdQmLzJMue6Hgrg?e=qUN8NX

//Excel
https://templetllc-my.sharepoint.com/:x:/r/personal/daniel_templetllc_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7BF9141218-F687-48F5-A982-6106A247688D%7D&file=Consolidated%20-%20Template%20list.xlsx&action=default&mobileredirect=true&clickparams=eyJBcHBOYW1lIjoiVGVhbXMtRGVza3RvcCIsIkFwcFZlcnNpb24iOiIyOC8yMzA3MDMwNzM0NiIsIkhhc0ZlZGVyYXRlZFVzZXIiOmZhbHNlfQ%3D%3D&wdOrigin=TEAMS-ELECTRON.p2p_ns.bim&wdExp=TEAMS-CONTROL&wdhostclicktime=1708005886531&web=1
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
<body id="top" data-access="<?=$validAccess?>" data-taskid="<?=$taskId?>" data-templatename="<?=$templateName?>" data-requestid="<?=$requestId?>" data-taskname="<?=$taskName?>" data-path="<?=$path?>" data-restype="<?=$restype_cr220?>" data-output="<?=$output?>" data-phase=<?=$phase?> data-childtask="<?=$child_task?>">
    <?php include('partials/nav.php'); ?>