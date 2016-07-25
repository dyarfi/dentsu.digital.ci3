
var Blank = function () {
	// Form apply vacancy
	var FormApply = function() {
		
		$('#vacancy-form').submit(function() {
			alert('asdf');
			return false;
		});
		
		$('.upload').change(function(){
			$('.file-label').empty().html($(this).val().replace("C:\\fakepath\\", ""));
		});
	}
	
	return {
        //main function to initiate the module
        init: function () {
        	
			FormApply();
            
        }

    };

}();