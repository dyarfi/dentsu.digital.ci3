var FormSetting = function () {
	
	var handleMaintenanceForm = function () {	
		//====== Maintenance mode in setting listing
		$('form#maintenance_form').submit(function(){
		    //$(":checked").val()
		    var val  = $(this).find('input:checked').val();
		    var link = $(this).attr('action');
			    //alert(window.location);
			    //alert(val);
		    if (link){
			    var pid = $(this).attr('pid');
			    var hash = $(this).attr('hash');
			    $.ajax({
				type: 'POST',
				url: link,
				data: 'ajax=true&field=default&mode='+val,
				datatype: "JSON",
				async: false,
				success: function(msg){
				    if (msg == 1) {
						alert('Please wait while updating data');    
				    }
					setInterval(window.location.reload(),3000);
				},
				error: function (request,setting){
				}
			    });
			      //window.location = window.location;
		      //window.location.reload();
		    }	
			    return false;
		});
		
		$('.maintenance_mode').change(function(){
			if ($(this).val() == 1) bootbox.alert("The site will be temporary off in maintenance mode. Click Submit to continue ");
		});
	
	}
	
    return {
        //main function to initiate the module
        init: function () {
        	
			handleMaintenanceForm();
		}
	}
	
}();