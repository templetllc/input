<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Content Manager - Outputs | Templet</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://templet.io/images/favicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css">

    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/f8d1b3f92a.js" crossorigin="anonymous"></script>

    <style>
        #browse-file {
            display: none;
        }
      </style>
</head>
<?php

if(isset($_GET['asignee'])){
    $asigneeName = $_GET['asignee'];
} else {
    $asigneeName = "";
};
    
?>
<body id="thanks" data-page="thanks">
    <?php include('partials/nav.php'); ?>

    <!-- Main Content -->
    <section class="bg-white">

        <!-- Collaterals - One : BEGIN -->
        <section class="bg-transparent files pb-5 mb-2">
        	
            <div class="content container">
                <div class="row">
                    <div class="col-12">
                        
                    </div>
                </div>
            </div>

            <div class="container mt-5 contact_us">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card gradient-badged py-2">
                            <div class="card-body">
                                <p class="ps-2"><span class="heavy">Need assistance?</span> <a href="#" class="text-white">Contact us</a> with any questions or concerns</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Collaterals - One : END -->      
    </section>

<!-- END Main Content -->

<?php include('partials/modal.php'); ?>

<?php include('partials/footer.php'); ?>