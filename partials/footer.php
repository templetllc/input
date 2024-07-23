    <!-- Footer - One : BEGIN -->
    <small class="path text-white"><?=$path?></small>
    <div class="footer bg-dark border-top">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-4">
                <div class="col-md-4 d-flex align-items-center">
                    <span class="text-green d-none d-md-block tag">Bigger. Faster. Better</span>
                </div> 

                <div class="col-md-4 text-center">
                    <a href="/" class="mb-0 me-2 mb-md-0 text-muted text-decoration-none lh-1 pe-2">
                        <img src="./images/templet.svg" width="100" alt="">                                          
                    </a>
                </div> 

                <div class="col-md-4 text-end">
                    <span class="text-muted">&copy; 2023 Templet LLC. All rights reserved.</span>

                </div>
            </footer>
        </div>
    </div>
    <!-- Footer - One : END -->


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>

    <!-- 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/js/plugins/sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/themes/fas/theme.min.js"></script>
    -->
    
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script>

    <script src="./js/file-upload.js"></script>
    <script src="./js/main.js"></script>
    <!-- <script type="module" src="loomRecorder.js"></script> -->

    <script>
        function toggleDivs() {
            var checkbox = document.getElementById("FileSwitch");
            var OneDrive = document.getElementById("onedrive");
            var BrowseFile = document.getElementById("browse-file");
            if (checkbox.checked) {
                OneDrive.style.display = "none";
                $(OneDrive).find('form').removeClass('active');
                BrowseFile.style.display = "block";
                $(BrowseFile).find('form').addClass('active');

            } else {
                OneDrive.style.display = "block";
                $(OneDrive).find('form').addClass('active');
                BrowseFile.style.display = "none";
                $(BrowseFile).find('form').removeClass('active');
            }
        }
    </script>
</body>
</html>