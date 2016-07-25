var FormStatus = function () {
	
	var handleStatusForm = function () {		
	    $('#select_action').change(
		    function () {
			    $(this).parents('form').submit();
		    }
	    );	
	}
	
    return {
        //main function to initiate the module
        init: function () {
	    handleStatusForm();
        }

    };

}();