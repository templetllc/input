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

		var validateForm = true;
		let btn = $(this);
		
		$('.btn-submit').prop('disabled', true);
		$('span.loading').removeClass('d-none');

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
					$('span.loading').addClass('d-none');
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
							$('span.loading').addClass('d-none');
							return false;
						}
					break;

					case 'loom':
						var pattern = "https://loom.com/share/";
						var pattern2 = "https://www.loom.com/share/";
						if(_value.length > 0){
							console.log(_value.indexOf(pattern), _value.indexOf(pattern2));
							if(_value.indexOf(pattern) != 0 && _value.indexOf(pattern2) != 0 ){
								$(_form).find('.error_'+_thisID).text("URL not valid.")
								$(_form).find('.error_'+_thisID).show();
								validateForm = false;

								$(btn).prop('disabled', false);
								$('span.loading').addClass('d-none');
								return false;
							}
						}
					break;

					case 'evernote':
						var pattern = "https://www.evernote.com/";
						if(_value.length > 0){
							if(_value.indexOf(pattern) != 0){
								$(_form).find('.error_'+_thisID).text("URL not valid.")
								$(_form).find('.error_'+_thisID).show();
								validateForm = false;

								$(btn).prop('disabled', false);
								$('span.loading').addClass('d-none');
								return false;
							}
						}
					break;

					case 'email':
						var pattern = "https://email.templet.io/admin/builder";
						if(_value.length > 0){
							if(_value.indexOf(pattern) != 0){
								$(_form).find('.error_'+_thisID).text("URL not valid.")
								$(_form).find('.error_'+_thisID).show();
								validateForm = false;

								$(btn).prop('disabled', false);
								$('span.loading').addClass('d-none');
								return false;
							}
						}
					break;

					case 'xd':
						var pattern = "https://xd.adobe.com/view/";
						if(_value.length > 0){
							if(_value.indexOf(pattern) != 0){
								$(_form).find('.error_'+_thisID).text("URL not valid.")
								$(_form).find('.error_'+_thisID).show();
								validateForm = false;

								$(btn).prop('disabled', false);
								$('span.loading').addClass('d-none');
								return false;
							}
						}
					break;

					case 'website':
						//var pattern = "https://sites.templet.io/admin/builder";
						var pattern = "https://";
						if(_value.length > 0){
							if(_value.indexOf(pattern) != 0){
								$(_form).find('.error_'+_thisID).text("URL not valid.")
								$(_form).find('.error_'+_thisID).show();
								validateForm = false;

								$(btn).prop('disabled', false);
								$('span.loading').addClass('d-none');
								return false;
							}
						}
					break;

					case 'frame':
						var pattern = "https://f.io";
						if(_value.length > 0){
							if(_value.indexOf(pattern) != 0){
								$(_form).find('.error_'+_thisID).text("URL not valid.")
								$(_form).find('.error_'+_thisID).show();
								validateForm = false;

								$(btn).prop('disabled', false);
								$('span.loading').addClass('d-none');
								return false;
							}
						}
					break;
				}
			}
		});

		//Validate select
		$(_form).find('select').each(function(){		
			var _thisID = $(this).attr('id');
			var _value = $(this).val();

			//Validate required
			if(typeof $(this).attr('required') !== "undefined"){
				if(_value.length == 0){
					$(_form).find('.error_'+_thisID).text("This field is required.")
					$(_form).find('.error_'+_thisID).show();
					validateForm = false;

					$(btn).prop('disabled', false);
					$('span.loading').addClass('d-none');
					return false;
				}
			};
		});

		//Validate language
		if($(_form).find('#language').length > 0){
			var lang = $(_form).find('#language:checked').val();
			if(typeof lang === "undefined"){
				$(_form).find('.error_language').text("You must select a language.")
				$(_form).find('.error_language').show();

				$(btn).prop('disabled', false);
				$('span.loading').addClass('d-none');
				validateForm = false;
				console.log("Error language");
				return false;
			};
		};

		if(validateForm){
			$('.btn-submit').prop('disabled', true);
			$('span.loading').removeClass('d-none');

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
    }

    var checkFolder = function(folder, id='')
    {

    	let folderId;

    	console.log(folder, id);

    	let url = 'include/checkFolder.php?folder='+folder+'&folderId='+id;

    	$.ajax({
		  	url: url,
		  	type: 'GET',
		  	async: false,
		  	beforeSend: function(){
		        $('.btn-submit').prop('disabled', true);
				$('span.loading').removeClass('d-none');
		    },
		  	success: function(response) {
		  		$('.btn-submit').prop('disabled', true);
				$('span.loading').removeClass('d-none');

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
    	console.log('fileId', fileId);
    	var _onedrive_link = $(_form).find('#onedrive_link').val();
		var _onedrive_file = $(_form).find('#onedrive_file').val();
		var _loom_link = $(_form).find('#loom_link').val();
		var _website_link = $(_form).find('#website_link').val();
		var _xd_link = $(_form).find('#xd_link').val();
		var _email_link = $(_form).find('#email_link').val();
		var _frameio_link = $(_form).find('#frameio_link').val();
		var _evernote_link = $(_form).find('#evernote_link').val();
		var _language = $(_form).find('#language').val();
		var _adobe_link = $(_form).find('#adobe_link').val();

		if(fileId.length != 0) {
			_onedrive_file =  fileId;
		} else if(typeof _onedrive_file === "undefined"){
			_onedrive_file = "";
		}
		if(typeof _onedrive_link === "undefined") _onedrive_link = "";
		if(typeof _loom_link === "undefined") _loom_link = "";
		if(typeof _website_link === "undefined") _website_link = "";
		if(typeof _xd_link === "undefined") _xd_link = "";
		if(typeof _email_link === "undefined") _email_link = "";
		if(typeof _frameio_link === "undefined") _frameio_link = "";
		if(typeof _evernote_link === "undefined") _evernote_link = "";
		if(typeof _adobe_link === "undefined") _adobe_link = "";
		if(typeof _language === "undefined") _language = "";

		var _task_id = $('body').data('taskid');
		var _phase = $('body').data('phase');
		var _child_task = $('body').data('childtask');

		
		var dataJson =  {
		    task_id		: _task_id.toString(),
		    request_id	: $('body').data('requestid'),
		    task_name	: $('body').data('taskname'),
		    template_name: $('body').data('templatename'),
		    path		: $('body').data('path'),
		    restype		: $('body').data('restype'),
		    phase		: _phase.toString(),
		    emailURL	: _email_link,
		    onedriveID  : _onedrive_file,
		    onedriveURL	: _onedrive_link,
		    loomURL		: _loom_link,
		    frameioURL	: _frameio_link,
		    websiteURL	: _website_link,
		    evernoteURL	: _evernote_link,
		    xdURL		: _xd_link,
		    adobeURL	: _adobe_link,
		    language	: _language,
		    version		: "1",
		    child_task  : _child_task.toString()
		};


        $.ajax ({
            contentType: "application/json",
            dataType: "json",
            type: 'POST',
            url:"https://prod-113.westus.logic.azure.com:443/workflows/17f511b70f474413b963ad527fdc1a99/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=OZ7gH7eSXTb4OpdeSmjEbMEvF3CddM8igLYRD2iaVa8",
            data: JSON.stringify(dataJson),
            complete: function() {
                console.log("success");
                //alert('Your form has been successfully submitted!');
                //location.reload();
                window.location.assign("thanks.php");
            }
        });

    }

});