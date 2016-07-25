<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fabric extends Public_Controller {

	var $attachment = '';
	var $participant = '';	
	
	public function __construct() {
		parent::__construct();
		
		// Load User related model in admin module
		$this->load->model('page/Pagemenus');
		$this->load->model('page/Pages');

        // Check if session was made 
		if ($this->participant) {
			
			// Set temporary data
			$this->_participant = $this->Participants->getParticipant($this->participant->id);
			
			// Unset data from session
			unset($this->participant);	
			
			// Set new data and to session
			$this->participant = $this->_participant;
			$this->session->set_userdata('participant',$this->participant);
			
		}
		
		// Get participant attachment by type
		$this->attachment = $this->Attachments->getParticipantAttachmentByType($this->participant->id);
		
		//print_r($this->attachment);		
		//print_r($this->participant);
		
	}

	public function index() {

		// Check if attachment is already existed
		if ($this->attachment) {

			// Redirect Participant already participated
			redirect('fabric/participated');

		}			

		if ($this->input->is_ajax_request()) {

			// Define initialize result
			$result['result'] = '';

			// Default data setup
			$fields	= array(
				'email' => '',
				);

		    // Fill error with default fields
			$errors	= $fields;

		    // Set validation rules
			$this->form_validation->set_rules('email', 'Email','trim|valid_email|required|min_length[5]|max_length[36]|callback_match_email|xss_clean');	    

		    // Check if post is requested
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			    // Validation form checks
				if ($this->form_validation->run() == FALSE)
				{
			         // Send errors to JSON text
					$result['result']['code'] = 0;
					$result['result']['text'] = validation_errors();
				}
				else
				{

			    	// Set default participant data
					$participant = $this->Participants->getByEmail($this->input->post('email'));

					// Set participant data to session
					$this->session->set_userdata('participant', $participant);

		            // Send success update password result
					$result['result']['code'] = 1;
					$result['result']['text'] = 'Thank you, wait for a moment please...';

				}

			} 	

			// Return data esult
			$data['json'] = $result;
			
			// Load data into view		
			$this->load->view('json', $this->load->vars($data));	

		}	

		//$data['logged_in']		= $this->logged_in;

 		// Set main template
		$data['main'] 			= 'fabric';

	    // Set site title page with module menu
		$data['page_title'] 	= 'Fabric Canvas';
		
		// Load fabric js library
		$data['js_files'] = ['fabric' => 
		[
		// Jquery File Upload
		'admin/plugins/jquery-file-upload/js/jquery.ui.widget.min.js',
		'admin/plugins/jquery-file-upload/js/jquery.iframe-transport.js',
		'admin/plugins/jquery-file-upload/js/jquery.fileupload.js',
		'admin/plugins/jquery-file-upload/js/jquery.fileupload-process.js',	
		'admin/plugins/jquery-file-upload/js/jquery.fileupload-validate.js',
		'admin/plugins/jquery-file-upload/js/jquery.fileupload-ui.js',
		'admin/plugins/jquery-file-upload/js/jquery.iframe-transport.js',
		
		// Jquery Fabric JS	
		'admin/plugins/fabric.js/canvas2image.js',
		// 'assets/admin/plugins/fabric.js/fabric-0.9.15.js', // old version
		'admin/plugins/fabric.js/fabric-1.6.0-rc.1.min.js',
		'admin/plugins/fabric.js/aligning_guidelines.js',
		'admin/plugins/fabric.js/client.js'
		]	
		];

		// Load js execution
		$data['js_inline'] = "
		$('#submit_email').submit(function(e) {
			e.preventDefault();
				// default form var
			var userform = $(this);				
                // process the form
			$.ajax({
				type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    //url       : 'process.php', // the url where we want to POST
				data        : $(this).serialize(), // our data object
				dataType    : 'json', // what type of data do we expect back from the server
				encode      : true,
                    //beforeSend: function(){
                    	//userform.find('input').prop(\"disabled\", true);
                    //},
				complete: function(message) {
					var msg = message.responseJSON;
					userform.find('.msg').empty();
					userform.find('.msg')
					.html('<div class=\"alert alert-danger msg\">'
						+'<button class=\"close\" data-close=\"alert\"></button>'
						+msg.result.text+'</div>');		

if (msg.result.code === 1) {
	userform.find('input').prop(\"disabled\", true);
	setTimeout(function() {
								// Do something after 5 seconds
		window.location.href = base_URL + 'fabric';
	}, 2000);
} else {
	userform.find('input').prop(\"disabled\", false);
}

						// userform.find('input').prop(\"disabled\", false);

						// $('.reload_captcha').click();
						// alert(msg.result);
						// console.log(msg.result);
},
error: function(x,message,t) {
	if(message===\"timeout\") {
		alert('got timeout');
	} else {
							//alert(message);
	}
}
}).always(function() {
	userform.find('input').prop(\"disabled\", true);
});				

return false;
});
";

		// Load site template
$this->load->view('template/public/template', $this->load->vars($data));	

}

	// Redirect if particpant already participated
public function participated () {
	
		// Check if attachment is already existed
	if (!$this->attachment) {

			// Redirect Participant already participated
		redirect('fabric');

	}	

		// Set Gallery Data
	$data['gallery'] 		= $this->Attachments->getAllAttachment('fabric');

		// Set Participated Data
	$data['attachment'] 	= $this->attachment;

		// Set main template
	$data['main'] 			= 'fabric';

	    // Set site title page with module menu
	$data['page_title'] 	= 'Fabric Canvas Gallery';

	    // Load qr code js execution
	$data['js_inline'] 		= "$('#fancybox').fancybox();
	$('.li-participated').hover(function(e){
		e.preventDefault();
		$(this).find('.participated').show();
	},function(e){
		e.preventDefault();
		$(this).find('.participated').hide();
	})";

		// Load site template
$this->load->view('template/public/template', $this->load->vars($data));

}


	// -------------- CALLBACK METHODS -------------- //

    // Match Email post to Database // Reverse Mode
public function match_email($email) {		

		// Check email if empty
	if ($email == '') {
		$this->form_validation->set_message('match_email', 'The %s can not be empty.');
		return false;
	}
		// Check email if match
	else if ($this->Participants->getByEmail($email) == 1) {

		$this->form_validation->set_message('match_email', 'The %s is already taken.');			

		return true;

	} else {
		$this->form_validation->set_message('match_email', 'Use valid email please.');		
		return false;
	} 

}
}