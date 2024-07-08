<div class="col-12">
    <div class="accordion" id="">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Upload files
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row justify-content-center pb-2">
                            <div class="col-12 p-0">
                                <div class="form-check form-switch" style="margin-left: -12px;">
                                    <input class="form-check-input success" type="checkbox" role="switch" id="FileSwitch" onchange="toggleDivs()">
                                    <label class="form-check-label" for="">OneDrive or Browse file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- onedrive -->
                    <div class="container" id="onedrive">
                        <div class="row justify-content-center pb-2">
                            <div class="col-12 p-0">
                                <form class="active" data-type="onedrive">  
                                    <div class="row">
                                        <div class="col-12 col-md-12 p-0">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Sites preview link</label>
                                                <input type="url" class="form-control" id="website_link" name="website_link" data-type="website" aria-describedby="" placeholder="https://…" required>
                                                <span class="error_website_link error">Mensaje de Error</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- <div class="col-12 col-md-12 p-0">
                                            <div class="mb-3">
                                                <label for="" class="form-label">OneDrive link</label>
                                                <input type="url" class="form-control valuable" id="onedrive_link" name="onedrive_link" aria-describedby="" placeholder="https://templetllc-my.sharepoint.com/…" required data-type="onedrive">
                                                <span class="error_onedrive_link error">Mensaje de Error</span>
                                            </div>
                                        </div> -->
                                        <div class="col-12 col-md-12 p-0">
                                            <div class="mb-3">
                                                <label for="onedrive_file" class="form-label">Support files</label>
                                                <select class="form-select valuable" name="onedrive_file" id="onedrive_file" data-type="onedrive_file" required>
                                                    <option value="" style="color: red;">- Select your file -</option>
                                                    <?php
                                                        foreach($files as $file){
                                                            if(!$file->IsFolder){
                                                                echo "<option value='".$file->Id."'>".$file->Name."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <span class="error_onedrive_file error">Mensaje de Error</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-12 p-0">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Loom link</label>
                                                <input type="url" class="form-control valuable" id="loom_link" name="loom_link" aria-describedby="" placeholder="https://loom.com/share/…" data-type="loom">
                                                <span class="error_loom_link error">Mensaje de Error</span>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-12 p-0">
                                            <label for="" class="form-label d-block">Language</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="language" id="language" value="english">
                                                <label class="form-check-label" for="language">English</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="language" id="language" value="spanish">
                                                <label class="form-check-label" for="language">Spanish</label>
                                            </div>
                                            <span class="error_language error">Mensaje de Error</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- onedrive -->

                    <!-- browse-file -->
                    <div class="container" id="browse-file" style="display:none;">
                        <div class="row justify-content-center pb-2">
                            <div class="col-12 p-0">
                                <form data-type="file">
                                    <div class="row">
                                        <div class="col-12 col-md-12 p-0">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Sites preview link</label>
                                                <input type="url" class="form-control" id="website_link" name="website_link" data-type="website" aria-describedby="" placeholder="https://…" required>
                                                <span class="error_website_link error">Mensaje de Error</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-md-12 p-0">
                                            <div class="file-upload-contain">
                                                <label for="fileupload" class="form-label">File</label>
                                                <input id="fileupload" name="fileupload" type="file" accept=".xd,.html,.zip"  required/>
                                                <span class="error_fileupload error">Mensaje de Error</span>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="col-12 col-md-12 p-0">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Loom link</label>
                                                <input type="url" class="form-control valuable" id="loom_link" name="loom_link" aria-describedby="" placeholder="https://loom.com/share/…" data-type="loom">
                                                <span class="error_loom_link error">Mensaje de Error</span>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-12 p-0">
                                            <label for="" class="form-label d-block">Language</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="language" id="language" value="english">
                                                <label class="form-check-label" for="language">English</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="language" id="language" value="spanish">
                                                <label class="form-check-label" for="language">Spanish</label>
                                            </div>
                                            <span class="error_language error">Mensaje de Error</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- browse-file -->
                </div>
            </div>
        </div>
    </div>
</div>