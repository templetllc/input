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
                    <div class="container d-none">
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
                                                <label for="" class="form-label">Video link (workfiles + preview)</label>
                                                <input type="url" class="form-control valuable" id="onedrive_link" name="onedrive_link" data-type="onedrive" aria-describedby="" placeholder="https://templetllc-my.sharepoint.com/…" required>
                                                <span class="error_onedrive_link error">Mensaje de Error</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-12 p-0">
                                            <div class="mb-3">
                                                <label for="" class="form-label">frame.io link</label>
                                                <input type="url" class="form-control valuable" id="frame_link" name="frame_link" data-type="frame" aria-describedby="" placeholder="https://f.io/…" required>
                                                <span class="error_frame_link error">Mensaje de Error</span>
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
                                                <label for="" class="form-label">Video link (workfiles + preview)</label>
                                                <input type="url" class="form-control valuable" id="onedrive_link" name="onedrive_link" data-type="onedrive" aria-describedby="" placeholder="https://templetllc-my.sharepoint.com/…" required>
                                                <span class="error_onedrive_link error">Mensaje de Error</span>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="col-12 col-md-12 p-0">
                                            <div class="mb-3">
                                                <label for="" class="form-label">frame.io link</label>
                                                <input type="url" class="form-control valuable" id="frame_link" name="frame_link" data-type="frame" aria-describedby="" placeholder="https://f.io/…" required>
                                                <span class="error_frame_link error">Mensaje de Error</span>
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