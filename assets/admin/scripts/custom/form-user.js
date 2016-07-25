var FormUser = function () {
	
	var handleUserForm = function () {
		
		if ($('#user-form').size() > 0) {
			
			$('#user-form').validate({
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",
				submitHandler: function (form) {				
					ajaxUser();
				}				
			});
			
		}
						
		$('.reload_captcha').click(function() {
			var url	= $(this).attr('rel');		
			$.ajax({
				type: "POST",
				url: url,
				cache: false,
				async: false,	
				success: function(msg){
					$('.reload_captcha').empty().html(msg);
					// Need random for browser recache
					img		= $('.reload_captcha').find('img');
					src		= img.attr('src');
					ran		= img.fadeOut(50).fadeIn(50).attr('src', src + '?=' + Math.random());
				},
				complete: function(msg) {},
				error: function(msg) {}
			});
			return false;	
		});
		
		if ($('#user-form-default').size() > 0) {
			
			$('#user-form-default').validate({
				//errorElement: 'span', //default input error message container
				errorClass: 'help-block', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore:"",			
				rules: {
					username: {
						required: true
					},
					email: {
						required: true
					}/*,
					password: {
						required: true
					},
					password_retype: {
						equalTo: "#password"
					}*/
				},					
				messages: {
					username: {
						required: "Username is required."
					},
					email: {
						required: "Email is required."
					}/*,
					password: {
						required: "Password is required."
					},
					password_retype: { 
						equalTo: "Password not match."
					}*/
				},					
				invalidHandler: function (event, validator) { //display error alert on form submit   
					$('.help-block', $('#user-form-default')).show();
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label.closest('.form-group').removeClass('has-error');
					label.remove();
				},
				errorPlacement: function (error, element) {
					error.insertAfter(element.closest('.input-icon'));
				},

				submitHandler: function (form) {
					form.submit();
				}

			});		
		}
	}
	
	var ajaxUser = function () {
		
		var userform = $('#user-form');
		var user_id = userform.find('input[name="user_id"]').val();
		
		userform.find('.msg').empty();
		userform.find('.msg').html('<img src="'+base_URL + 'assets/admin/img/input-spinner.gif"/>&nbsp;Saving profile');
		$.ajax({
			url: base_URL + 'admin/user/ajax/update/' + user_id,
			type: 'POST',
			data: userform.serialize(),
			timeout: 5000,
			dataType: "JSON",
			cache: true,
			async: true,
			success: function(message) {
				//alert(message);
				// Empty loader
				//callback.empty().hide();
				// Empty loader image
				//loader.hide();
			},
			complete: function(message) {
				var msg = message.responseJSON;
				
				userform.find('.msg').empty();
				userform.find('.msg')
				.html('<div class="alert alert-danger msg">'
				+'<button class="close" data-close="alert"></button>'
				+msg.result.text+'</div>');				

				if (msg.result.code === 1) {					
					setTimeout(function() {
						// Do something after 5 seconds
						//window.location.href = base_URL + 'admin/authenticate/login';
					}, 6000);
				}
				
				$('.reload_captcha').click();
				
				//alert(msg.result);
				//console.log(msg.result);
			},
			error: function(x,message,t) { 
				if(message==="timeout") {
					alert("got timeout");
				} else {
					//alert(message);
				}	
			}
		});
		
		return false;		
	}
	
	var handleUserFormInput = function() {
		// =========== Input Type Lookup Function =============	
		//Check username that already taken
		$('#username').blur(function() {
			
			var userform = $('#user-form-add');
			var uinputed = userform.find('input[name="username"]');
			var uivalued = $(this).val();
			var igrouped = uinputed.parents('.form-group');
			var isbutton = userform.find('button[type="submit"]');
			
			$.ajax({
				url: base_URL + 'admin/user/ajax/check/username',
				type: 'POST',
				data: 'username='+uivalued,
				timeout: 5000,
				dataType: "JSON",
				cache: true,
				async: true,
				success: function(message) {
					//alert(message);
					// Empty loader
					//callback.empty().hide();
					// Empty loader image
					//loader.hide();
				},
				complete: function(message) {
					var msg = message.responseJSON;
					
					if (msg.result.code === 1) {
						//Get form group add has error input
						igrouped.addClass('has-error');
						//Get form group add has error input
						igrouped.find('.help-block')
								.removeClass('hidden')
								.text(msg.result.text);
						
						isbutton.prop( "disabled", true );
						
					} else {						
						//Get form group add has error input
						igrouped.removeClass('has-error');
						//Get form group add has error input
						igrouped.find('.help-block')
								.addClass('hidden')
								.empty();
						
						isbutton.prop( "disabled", false );
					}

				},
				error: function(x,message,t) { 
					if(message==="timeout") {
						alert("got timeout");
					} else {
						//alert(message);
					}	
				}
			});
		});
		
		//Check user email that already exists
		$('#email').blur(function() { 
			var userform = $('#user-form-add');
			var uinputed = userform.find('input[name="email"]');
			var uivalued = $(this).val();
			var igrouped = uinputed.parents('.form-group');		
			var isbutton = userform.find('button[type="submit"]');			
			
			$.ajax({
				url: base_URL + 'admin/user/ajax/check/email',
				type: 'POST',
				data: 'email='+uivalued,
				timeout: 5000,
				dataType: "JSON",
				cache: true,
				async: true,
				success: function(message) {
					//alert(message);
					// Empty loader
					//callback.empty().hide();
					// Empty loader image
					//loader.hide();
				},
				complete: function(message) {
					var msg = message.responseJSON;
					
					if (msg.result.code === 1) {
						//Get form group add has error input
						igrouped.addClass('has-error');
						//Get form group add has error input
						igrouped.find('.help-block')
								.removeClass('hidden')
								.text(msg.result.text);
						
						isbutton.prop( "disabled", true );
						
					} else {						
						//Get form group add has error input
						igrouped.removeClass('has-error');
						//Get form group add has error input
						igrouped.find('.help-block')
								.addClass('hidden')
								.empty();
						
						isbutton.prop( "disabled", false );
					}

				},
				error: function(x,message,t) { 
					if(message==="timeout") {
						alert("got timeout");
					} else {
						//alert(message);
					}	
				}
			});
		});
	}
	
	var handleUserFormPost = function() {
		
		var userform = $('#user-form-password');
			
		//Submit data via ajax
		$('#user-form-password').submit(function() {
			
			var uinputed = userform.find('input[name="password"]');
			var uivalued = $(this).val();
			var igrouped = uinputed.parents('.form-group');		
			var isbutton = userform.find('button[type="submit"]');	
			var user_id = userform.find('input[name="user_id"]').val();
			
			userform.find('.msg').empty();
			userform.find('.msg').html('<img src="'+base_URL + 'assets/img/input-spinner.gif"/>&nbsp;Saving password');		
			
			$.ajax({
				url: base_URL + 'admin/user/ajax/check/password',
				type: 'POST',
				data: userform.serialize(),
				timeout: 5000,
				dataType: "JSON",
				cache: true,
				async: true,
				success: function(message) {
					//alert(message);
					// Empty loader
					//callback.empty().hide();
					// Empty loader image
					//loader.hide();
				},
				complete: function(message) {
					var msg = message.responseJSON;

					userform.find('.msg').empty();
					userform.find('.msg')
					.html('<div class="alert alert-danger msg">'
					+'<button class="close" data-close="alert"></button>'
					+msg.result.text+'</div>');				
					
					if (msg.result.code === 1) {					
						setTimeout(function() {
							// Do something after 5 seconds
							alert('Logging you out, you can login again with the new password');					
							window.location.href = base_URL + 'admin/authenticate/logout';
						}, 6000);
					}

					//alert(msg.result);
					//console.log(msg.result);
				},
				error: function(x,message,t) { 
					if(message==="timeout") {
						alert("got timeout");
					} else {
						//alert(message);
					}	
				}
			});

			return false;	
		});
	}
	
	var handleUserImgForm = function () {
		if(typeof $.fn.fileupload != 'undefined') {
			$('#fileupload-img').fileupload({
				url: $(this).attr('data-url'),
				dataType: 'json',
				//acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
				//maxFileSize:2000000, // 2000 KB
				sequentialUploads: false,
				add: function (e, data) {
					var uploadErrors = [];
					//var acceptFileTypes = /\/(pdf|xml)$/i;
					var acceptFileTypes = /(\.|\/)(gif|jpe?g|png)$/i;
					if(data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
						uploadErrors.push('Invalid file type, aborted');
					}
					//console.log(data.originalFiles[0]['size']) ;
					if(data.originalFiles[0]['size'] > 5000000) {
						uploadErrors.push('Filesize is too big');
					}
					if(uploadErrors.length > 0) {
						alert(uploadErrors.join("\n"));
					} else {
						//data.context = $('<p/>').text('Subiendo...').appendTo('.img_holder_xhr');
						data.submit();
					}
		        },
		        done: function (e, data) {
					e.preventDefault();
					$.each(data.result.files, function (index, file) {	
						//alert(file.error);
						$('.img-thumbnail a.handle-img')
						.prop('href',base_URL + file.url).empty()
						.html('<img src="'+base_URL + file.thumbnailUrl+'"//>');
						$('input[name="image_temp"]').attr('value',file.name);
		            });			
					$('.progress').hide();			
					$('.button-submit').show({duration:'260',easing:'easeInOutBack'});
		        },
		        progressall: function (e, data) {
					e.preventDefault();
		            var progress = parseInt(data.loaded / data.total * 100, 10);
					$('.progress').show();
		            $('.progress .progress-bar').css(
		                'width',
		                progress + '%'
		            ).html(progress+'% Sedang mengunggah, mohon menunggu..');
		            $('.button-submit').hide({duration:'260',easing:'easeInOutBack'});
		        }
		    })
			.on('fileuploadfail', function (e, data) {
		        $.each(data.files, function (index) {
		        	var error = $('<span class="text-danger"/>').text('File upload failed.');
		            $(data.context.children()[index])
		                .append('<br>')
		                .append(error);
		            //console.log(files);
		        });
		    })
			.prop('disabled', !$.support.fileInput)
		        .parent().addClass($.support.fileInput ? undefined : 'disabled');

			$('#fileupload').bind('fileuploadprogress', function (e, data) {
				// Log the current bitrate for this upload:
				//console.log(data.bitrate);
			});
		}	
	}

	var FormChangePassword = function() {
		
		
	}
	
    return {
        //main function to initiate the module
        init: function () {
        	
	    handleUserForm();
	    handleUserFormInput();
	    handleUserFormPost();
	    handleUserImgForm();

        }

    };

}();