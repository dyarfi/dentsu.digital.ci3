var FormModule = function () {
	
	var handleModuleForm = function () {	
		// --------------------- Used in Module Listing
		$('.module_menu').change( function () {		
			var selected = $(this).parent().find('table tr td input[class="check_hidden_mplr"]');
			var closests = $(this).parents('.select_holder').find('div[class^="checker"] span');
			if ($(this).is(':checked')) { selected.prop('checked','checked'); /*closests.removeClass('checked');*/ } 
			if (!$(this).is(':checked')) { selected.prop('checked',''); /*closests.addClass('checked');*/ }	
		});

		$('input[class^="check_hidden_mplr"]').change( function () {
			var $parent_module = $(this).closest("table").parent("td").find('input[name^="module_menu[group_id]"]');
		    if ($(this).is(':checked') == true) {
				$parent_module.prop('checked','checked');
		    } //else {
				//$parent_module.prop('checked','');
		    //}
		});	

		$('.fadeOut').fadeOut(3000);
		// --------------------- end --- Used in Module Listing
		
	 	$('input[type="checkbox"]#ipt_checkall').click(function(){
		    var value = $(this).prop('checked');
		    if (value==true){
			$('input[type="checkbox"].ipt_tocheck').each(function(){
			   $(this).prop('checked','checked').addClass('activecheck'); 
			});
		    }else{
			$('input[type="checkbox"].ipt_tocheck').each(function(){
			   $(this).prop('checked','').removeClass('activecheck');
			});
		    }
		});

		$('input[type="checkbox"].ipt_tocheck').click(function(){
			var value = $(this).attr('checked');
			if (value==true){
				$(this).prop('checked','checked').addClass('activecheck');     
			}else{
				$(this).removeAttr('checked').removeClass('activecheck');
			}
		});
	
	}
	
    return {
        //main function to initiate the module
        init: function () {
        	
			handleModuleForm();
		}
	}
	
}();