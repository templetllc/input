var projectID = '01G3FULMXL5C5ALPTTXNBL6GQ3NIPWBAEZ';

$(function(){

	var init = function(){

		//Check if we have all fields
		var validateAccess = $('body').data('access');
		if(validateAccess == 0){
			$('.footer').addClass('footer-sticky');
			$("#errorModal").modal('show');
		}

		//Check if have thank you page
		var thanksPage = $('body').data('page');
		if(thanksPage == 'thanks'){
			$("#verifiedModal").modal('show');
		}

		//Add * field required
		$('body').find('form').each(function(){

			let _form = $(this);

			//input
			$(_form).find('input').each(function(){

				if(typeof $(this).attr('required') !== "undefined"){
					let _parent;

					if($(this).attr('name') == 'fileupload') {
						_parent = $('div.file-upload-contain');
					} else {
						_parent = $(this).parent('div');
					}

					let _label = $(_parent).find('label').text();
					$(_parent).find('label').html(_label+' <span class="text-danger">*</span>')
				};
			});

			//Select
			$(_form).find('select').each(function(){
				if(typeof $(this).attr('required') !== "undefined"){
					let _label = $(this).parent('div').find('label').text();
					$(this).parent('div').find('label').html(_label+' <span class="text-danger">*</span>')
				};
			});

			//Option
			if($(_form).find('#language').length > 0){
				
				let _option = $(_form).find('#language').parent('div');
				let _parent = $(_option).parent('div');
				let _label = $(_parent).find('.form-label').text();

				$(_parent).find('.form-label').html(_label+' <span class="text-danger">*</span>')
			};

		});
		
	};

	$('.btn-submit').click(function(e){
		e.preventDefault()

		let _form = $('body').find('form.active');
		let _formTemplate = $('body').find('form.form-template');
		let _area = $('body').data('area');

		var validateForm = true;
		let btn = $(this);
		
		$('.btn-submit').prop('disabled', true);
		$('div.loading').removeClass('d-none');

		//Search each input
		$(_form).find('input').each(function(){			
			var _thisID = $(this).attr('id');
			var _value = $(this).val();

			//Validate required
			if(typeof $(this).attr('required') !== "undefined"){
				if(_value.length == 0){
					$(_form).find('.error_'+_thisID).text("This field is required.")
					$(_form).find('.error_'+_thisID).show();
					validateForm = false;

					$(btn).prop('disabled', false);
					$('div.loading').addClass('d-none');
					return false;
				}
			};

			//Validate for type of field
			var data_type = $(this).data('type');
			if(typeof data_type !== "undefined"){

				switch(data_type){
					case 'onedrive':
						var pattern = "https://templetllc-my.sharepoint.com/";
						if(_value.indexOf(pattern) != 0){
							$(_form).find('.error_'+_thisID).text("URL not valid.")
							$(_form).find('.error_'+_thisID).show();
							validateForm = false;

							$(btn).prop('disabled', false);
							$('div.loading').addClass('d-none');
							return false;
						}
					break;

					case 'loom':
						var pattern = "https://loom.com/share/";
						var pattern2 = "https://www.loom.com/share/";
						if(_value.length > 0){
							if(_value.indexOf(pattern) != 0 && _value.indexOf(pattern2) != 0 ){
								$(_form).find('.error_'+_thisID).text("URL not valid.")
								$(_form).find('.error_'+_thisID).show();
								validateForm = false;

								$(btn).prop('disabled', false);
								$('div.loading').addClass('d-none');
								return false;
							}
						}
					break;
				}
			}
		});

		//Validate Template
		if(_area == 'CONTENT' || _area == 'CREATIVE'){
			let _valueWrite = $('#template_write').val();
			let _valueDesign = $('#template_design').val();

			if(_valueWrite.length == 0 && _valueDesign.length == 0){
				console.log("Error Template");
				$(_formTemplate).find('.error_template_link').text("This field is required.")
				$(_formTemplate).find('.error_template_link').show();
				validateForm = false;

				$(btn).prop('disabled', false);
				$('div.loading').addClass('d-none');
				return false;
			}
			
		};

		//Validate select
		$(_form).find('select').each(function(){		
			let _thisID = $(this).attr('id');
			let _value = $(this).val();

			//Validate required
			if(typeof $(this).attr('required') !== "undefined"){
				if(_value.length == 0){
					$(_form).find('.error_'+_thisID).text("This field is required.")
					$(_form).find('.error_'+_thisID).show();
					validateForm = false;

					$(btn).prop('disabled', false);
					$('div.loading').addClass('d-none');
					return false;
				}
			};
		});

		//Validate language
		if($(_form).find('#language').length > 0){
			let lang = $(_form).find('#language:checked').val();
			if(typeof lang === "undefined"){
				$(_form).find('.error_language').text("You must select a language.")
				$(_form).find('.error_language').show();

				$(btn).prop('disabled', false);
				$('div.loading').addClass('d-none');
				validateForm = false;
				console.log("Error language");
				
			};
		};
		
		if(validateForm){
			$('.btn-submit').prop('disabled', true);
			$('div.loading').removeClass('d-none');

			setTimeout(() => {
				sendProcess(_form);
			}, "2000");
		}
		
	});

	$('body').on('change', '#language', function(){
		$('body').find('.error_language').hide();
	});

	$('body').on('change', '#fileupload', function(){
		$('body').find('.error_fileupload').hide();
	});

	$('.valuable').on('blur', function(){
        var _fieldId = $(this).attr('id');
        $('.error_'+_fieldId).hide();
    });

    init();

    $('.btn-template').on('click', function(){

    	let _client = $('body').data('client');
        if(_client.length <= 1){
            return false;
        }

        let _restType = $('body').data('restype');
        if(_restType.length <= 1){
            return false;
        }

		$('.error_template_link').hide();

        $('#ModalChooseTemplate').modal('show');
		            
    });


    $('#ModalChooseTemplate').on('show.bs.modal', function (event) {

    	let _client = $('body').data('client');
		let _restType = $('body').data('restype');
        
        let dataString = {'restype': _restType, 'client': _client};

        let selectCategories = "#inputCategoryTemplates";

        let _have = false;

        $.ajax({
            url: "include/getCategories.php",
            type: 'GET',
            data: dataString,
            async: false,
            success: function (response) {
            
                let data = jQuery.parseJSON(response)
                let len = data.length;
                $(selectCategories).empty();
                $(selectCategories).append('<option value="">- Select Category -</option>');

                for(var i=0; i<len; i++){
                    _value = data[i]['value'];
                    _category = data[i]['category'];
                    
                    if(_category.length > 0 ){
                        $(selectCategories).append('<option value="' + _value + '">' + _category + '</option>');
                        _have = true;
                    }
                }

                if(!_have){
                    $(selectCategories).empty();
                    $(selectCategories).append('<option value="">- Categories not found -</option>');
                } 

                getTemplates(dataString);

            },
            error:function(response){
                console.log(response);
            }
        });     
    });

    var getTemplates = function(dataString)
    {
    	let containerTemplates = '.template-list';
        $(containerTemplates).empty();
        $('.no-result_templates').hide();

    	$.ajax({
            url: "include/getTemplates.php",
            type: 'GET',
            data: dataString,
            async: false,
            success: function (response) {
                if(response.length > 5) {
	                $(containerTemplates).html(response);

	                Promise.all(Array.from(document.images).filter(img => !img.complete).map(img => new Promise(resolve => { img.onload = img.onerror = resolve; }))).then(() => {
			            const msnry = new Masonry('.template-list', {
			                itemSelector: '.card-root',
			                percentPosition: true
			            });
			            msnry.layout();
			        });
	            } else {
	                $('.no-result_templates').show();
	            }
	            return true;
            },
            error:function(response){
                console.log(response);
            }
        }); 
    };

    $('#modalPreview').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let client 	= $(button).parents('.template-item').data('client');
        let restype = $(button).parents('.template-item').data('restype');
        let thumbnail = $(button).parents('.template-item').find('.template-image ').attr('src');
        let title = $(button).parents('.template-item').find('.title-card').attr('title');

        let modal = $(this);
        let width = $(button).attr('data-width');

       
        modal.find('.imagen-modal').attr('src', thumbnail);

        modal.find('.modal-title').text(title);
        modal.find('.modal-dialog').css('max-width', width+'px');

        $(this).css('z-index', 1052);

    });

    $('#modalPreview').on('shown.bs.modal', function (event){
        $('.modal-backdrop').last().css('z-index', 1051);
    });

    $('#modalPreview').on('hidden.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.imagen-modal').attr('src', thumbnail);
    });

    $('[data-toggle=drop-category]').on('change', function(){
        let _client = $('body').data('client');
		let _restType = $('body').data('restype');

        let _category = $(this).val();
        
        if(_category.length == 0){
        	let dataString = {'restype': _restType, 'client': _client};
            getTemplates(dataString);
            return false;
        }

        let dataString = {'restype': _restType, 'client': _client, 'category': _category};

        getTemplates(dataString);

    });

    $('body').on('click', '.btn-select-template', function(){
        
        let client 	= $(this).parents('.template-item').data('client');
        let restype = $(this).parents('.template-item').data('restype');
        let thumbnail = $(this).parents('.template-item').find('.template-image ').attr('src');
        let title = $(this).parents('.template-item').find('.title-card').attr('title');

        $(this).parents('.template-item').toggleClass('active');

        $('#ModalChooseTemplate').modal('hide');

    });

    $('#ModalChooseTemplate').on('hidden.bs.modal', function (event) {
        let modal = $(this);
        
        let templateSelected = modal.find('.template-item.active');
        let imageSelected = templateSelected.find('.template-image').attr('src');
        let titleSelected = templateSelected.find('.title-card').attr('title');

        $('#template_write').val(templateSelected.data('write'));
		$('#template_design').val(templateSelected.data('design'));
		$('.template-selected').find('img').attr('src', imageSelected);
		$('.template-selected').find('.title-template').text(titleSelected);
		$('.template-selected').removeClass('d-none');

    });

    var sendProcess = function(_form)
    {
    	if($(_form).data('type') == 'onedrive'){

			sendFlow(_form);

		} else if($(_form).data('type') == 'file') {
			//https://templet-uploads.azurewebsites.net/api/OnedriveUpload

			let clientId, initiativeId, restypeId, folderId;
			var form_data = new FormData();
			var path = $('body').data('path');
			path = path.substring(1);
			path = path.substring(path.indexOf('/'));
			path = path.substring(1);

			let client = path.substring(0, path.indexOf('/'));
			clientId = checkFolder(client);
			
			path = path.substring(path.indexOf('/'));
			path = path.substring(1);
			let initiative = path.substring(0, path.indexOf('/'));
			initiativeId = checkFolder(initiative, clientId);
			
			path = path.substring(path.indexOf('/'));
			path = path.substring(1);
			let restype = path.substring(0, path.indexOf('/'));
			restypeId = checkFolder(restype, initiativeId);

			path = path.substring(path.indexOf('/'));
			path = path.substring(1);
			let folder = path.substring(0, path.indexOf('/'));
			folderId = checkFolder(folder, restypeId);

			///Projects/FRONTIER/FRONTIER - PRODUCTS - Wavelength/Emails/04_Previews/

		    $(_form).find("input[type=file]").each(function(index, field){
		        for(var i=0;i<field.files.length;i++) {
		            var file = field.files[i];
		            var value = $(field).val();
		            var fileName = value.substring(value.lastIndexOf('\\') + 1)

		            form_data.append("fileToUpload", field.files[i]);
		            form_data.append("folderid", folderId);

		            let url = 'include/uploadFile.php'

		            $.ajax({
					  	url: url,
					  	data: form_data,
					  	type: 'POST',
					  	mimeType: "multipart/form-data",
				        contentType: false,
				        // cache: false,
				        processData: false,
					   	success: function (data) {
					      	let fileId = checkFolder(data, folderId);

					      	sendFlow(_form, fileId);
					      	//location.reload();
					   	},
					   	error: function (err) {
					      	// Code blocks if formData send failed
					   	},
					})
		        }
		    });

		} else {
			alert("We encountered a problem processing the data, please contact your system administrator.")
		}
    };

    var checkFolder = function(folder, id='')
    {

    	let folderId;

    	//console.log(folder, id);

    	let url = 'include/checkFolder.php?folder='+folder+'&folderId='+id;

    	$.ajax({
		  	url: url,
		  	type: 'GET',
		  	async: false,
		  	beforeSend: function(){
		        $('.btn-submit').prop('disabled', true);
				$('div.loading').removeClass('d-none');
		    },
		  	success: function(response) {
		  		$('.btn-submit').prop('disabled', true);
				$('div.loading').removeClass('d-none');

				folderId = response;
		  	},
		   	error: function (err) {
		      	// Code blocks if formData send failed
		   	},
		})

    	return folderId;
    };

    var sendFlow = function(_form, fileId = '')
    {
    	
    	let _formTemplate = $('#formTemplate');

    	//console.log('fileId', fileId);
    	
    	let _onedrive_link = $(_form).find('#onedrive_link').val();
		let _loom_link = $(_form).find('#loom_link').val();
		let _language = $(_form).find('#language').val();
		let _write_link = $(_formTemplate).find('#template_write').val();
		let _design_link = $(_formTemplate).find('#template_design').val();
		let _area = $('body').data('area');
		let _templateURL = '';
		

		if(fileId.length != 0) {
			_onedrive_file =  fileId;
		} else if(typeof _onedrive_file === "undefined"){
			_onedrive_file = "";
		}
		if(typeof _onedrive_link === "undefined") _onedrive_link = "";
		if(typeof _loom_link === "undefined") _loom_link = "";
		if(typeof _language === "undefined") _language = "";
		if(typeof _write_link === "undefined") _write_link = "";
		if(typeof _design_link === "undefined") _design_link = "";
		

		if(_area == 'CONTENT') {
			_templateURL = _write_link;
		} else if(_area == 'CREATIVE') {
			_templateURL = _design_link;
		};

		let _task_id = $('body').data('taskid');
		let _phase = $('body').data('phase');
		let _child_task = $('body').data('childtask');

		
		var dataJson =  {
		    task_id		: _task_id.toString(),
		    request_id	: $('body').data('requestid'),
		    task_name	: $('body').data('taskname'),
		    template_name: $('body').data('templatename'),
		    path		: $('body').data('path'),
		    restype		: $('body').data('restype'),
		    phase		: _phase.toString(),
		    onedriveID  : _onedrive_file,
		    onedriveURL	: _onedrive_link,
		    loomURL		: _loom_link,
		    language	: _language,
		    templateURL	: _templateURL,
		    version		: "1",
		    child_task  : _child_task.toString()
		};


        $.ajax ({
            contentType: "application/json",
            dataType: "json",
            type: 'POST',
            url:"https://prod-138.westus.logic.azure.com:443/workflows/b034f7123c2d492da5cb9ab557a1ed9f/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=hCB0yXg_qgncaG70d4ScRVtE-atXTOBU2d8jWwTdDWg",
            data: JSON.stringify(dataJson),
            complete: function() {
                console.log("success");
                //alert('Your form has been successfully submitted!');
                //location.reload();
                window.location.assign("thanks.php");
            }
        });

    }

    $('.btn-drive').on('click', function(){
    	let path = $('body').data('path');

    	let url = 'https://templetllc-my.sharepoint.com/personal/daniel_templetllc_onmicrosoft_com/Documents' + path;

    	window.open(url, '_blank')
    });

});