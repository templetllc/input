<?php
$restype   = $_GET['restype'];
$client    = $_GET['client'];
$category  = isset($_GET['category']) ? $_GET['category'] : '';

if(empty($client)) {
    die("Client is missing");
    return false;
};

if(empty($restype)) {
    die("Resource Type is missing");
    return false;
};

$client = strstr($client, " ", true);
$restype = strstr($restype, " ", true);

if(strtolower($restype) == 'design') $restype = 'designs';

$url = 'https://templates.templet.io/'.strtolower($client).'/templates.json';

$data = @file_get_contents($url);
$templates = json_decode($data);

if($templates){

    $html = '';
    foreach ($templates as $key => $file) {
        $writer     = $file->writer;
        $design     = $file->design;

        if(strtolower($restype) != strtolower($file->restype)) continue;

        if(!empty($category)){
            if($category != str_replace(' ', '_', strtolower($file->category))) continue;
        }

        $_url = '#';
        $_thumbnail = "https://templates.templet.io/".strtolower($file->client)."/pages/".$file->restype.'/images/thumbnails/'.$file->image;

        $html .= '<div class="col-lg-3 col-xl-2 pb-4 template-item" data-client="'.$file->client.'" data-restype="'.$file->restype.'">';
        $html .= '    <div class="card card-sm" >';
        $html .= '        <div class="img-50">';
        $html .= '            <a href="'.$_url.'" target="" class="d-block">';
        $html .= '                <img src="'.$_thumbnail.'" class="w-100">';
        $html .= '            </a>';
        $html .= '        </div>';
        $html .= '        <div class="card-body" >';
        $html .= '            <div class="d-flex">';
        $html .= '                <div>';
        $html .= '                    <h6 class="title-card mb-2" data-title="'.$file->title.'" data-tooltip="tooltip" title="'.$file->title.'">'.$file->title.'</h6>';
        $html .= '                </div>';
        $html .= '            </div>';
        $html .= '        </div>';

        //Options Menu
        $html .= '        <div class="overlay">';
        $html .= '            <div class="button-action row align-item-center justify-content-center text-center">';
        $html .= '                 <div class="col-12"><button class="btn btn-primary mb-2 btn-use-template">';
        $html .= '                    Select';
        $html .= '                 </button></div>';
        $html .= '                 <div class="col-12"><button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalPreview" data-width="920">';
        $html .= '                    View';
        $html .= '                 </button></div>';
        // $html .= '                 <div class="col-12"><button class="btn btn-primary" data-toggle="modal" data-target="#ModalSendTest">';
        // $html .= '                    Send a test';
        // $html .= '                 </button></div>';
        $html .= '            </div>';
        $html .= '        </div>';
        $html .= '    </div>';
        $html .= '</div>';
    };

    echo $html;

};

