<?php include('partials/header.php'); ?>

<!-- Main Content -->
<section class="bg-white">
    <!-- Banner - One : BEGIN -->
    <main class="header">
        <div class="container">
            <div class="row align-items-center justify-content-center py-5">
                <div class="col-md-12 text-left">
                    <!-- <h1 class="display-6 mt-1 mb-0">Hi <span class="name"><?=$asigneeName?></span> Happy to hear from you again!</h1> -->
                    <h1 class="display-6 mt-1 mb-0">Hi, happy to hear from you again!</h1>
                    <p class="fs-5 pt-1 text-white mb-0">Ready to assign a new task?</p>
                </div>
            </div>
        </div>
    </main>
    <!-- Banner - One : END -->

    <!-- Collaterals - One : BEGIN -->
    <section class="bg-transparent files pb-5 mb-2">
    	
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                    	<!-- Project Panel -->
                    	<?php include('partials/project-panel.php'); ?>
                    	<!-- END Project Panel -->

                        <!-- Form Restype -->
                        <?php include('./form.php');?>
                        <!-- END Form Restype -->
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary-t mt-2 text-uppercase btn-submit">
                        SUBMIT
                    </button>
                    <div class="spinner-border loading d-inline-block text-secondary align-middle ms-2 d-none" role="status">
                      <span class="sr-only"></span>
                    </div>
                    <!-- <span class="loading d-inline-block ml-5">
                        <img src="images/loading.gif" class="img-fluid">
                    </span> -->
                </div>
            </div>
        </div>

        <div class="container mt-5">
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