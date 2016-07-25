var Login = function () {
	
	var introLogin = function() {
		$('.login').find('.content').fadeIn('slow');
	}
	
	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                remember: {
	                    required: false
	                }
	            },

	            messages: {
	                username: {
	                    required: "Username is required."
	                },
	                password: {
	                    required: "Password is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.login-form')).show();
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

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    $('.login-form').submit();
	                }
	                return false;
	            }
	        });
	}

	var handleForgetPassword = function () {
		$('.forget-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
				ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                email: {
	                    required: "Email is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

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
					ajaxForget();
	            }
	        });

	        $('.forget-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.forget-form').validate().form()) {
	                    $('.forget-form').submit();
	                }
	                return false;
	            }
	        });

	        jQuery('#forget-password').click(function () {
	            jQuery('.login-form').hide('fast');
	            jQuery('.forget-form').show('fast');
	        });

	        jQuery('#back-btn').click(function () {
	            jQuery('.login-form').show('fast');
	            jQuery('.forget-form').hide('fast');
	        });

	}
	
	var handleRegister = function () {

		function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='assets/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }

		if ($("#select2_sample4").size() > 0) {
			$("#select2_sample4").select2({
				placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',
				allowClear: true,
				formatResult: format,
				formatSelection: format,
				escapeMarkup: function (m) {
					return m;
				}
			});
	
			$('#select2_sample4').change(function () {
				$('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
			});
		}

         $('.register-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                
	                fullname: {
	                    required: true
	                },
	                email: {
	                    required: true,
	                    email: true
	                },
	                address: {
	                    required: true
	                },
	                city: {
	                    required: true
	                },
	                country: {
	                    required: true
	                },

	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                rpassword: {
	                    equalTo: "#register_password"
	                },

	                tnc: {
	                    required: true
	                }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
	                tnc: {
	                    required: "Please accept TNC first."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

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
	                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
	                    error.insertAfter($('#register_tnc_error'));
	                } else if (element.closest('.input-icon').size() === 1) {
	                    error.insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                form.submit();
	            },
						
	        });

			$('.register-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.register-form').validate().form()) {
	                    $('.register-form').submit();
	                }
	                return false;
	            }
	        });

	        jQuery('#register-btn').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.register-form').show();
	        });

	        jQuery('#register-back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.register-form').hide();
	        });
	}
	
	var ajaxForget = function(){
		var formForget = $('.forget-form');
		
		$.ajax({
			url: base_URL + 'admin/user/forgot_password',
			type: 'POST',
			data: formForget.serialize(),
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
				formForget.find('.msg').empty();
				formForget.find('.msg')
				.html('<div class="alert alert-danger msg">'
				+'<button class="close" data-close="alert"></button>'
				+msg.result.text+'</div>');				
		
				if (msg.result.code === 1) {					
					setTimeout(function() {
						// Do something after 5 seconds
						window.location.href = base_URL + 'admin/authenticate/login';
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
	}
    
    return {
        //main function to initiate the module
        init: function () {
        	
			introLogin();
            handleLogin();
            handleForgetPassword();
            handleRegister();        
			
	       	$.backstretch([
		        base_URL + "assets/admin/img/bg/1.jpg",
		        base_URL + "assets/admin/img/bg/2.jpg",
		        base_URL + "assets/admin/img/bg/3.jpg",
		        base_URL + "assets/admin/img/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		    });
        }

    };

}();