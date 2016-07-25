<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DropboxUploader extends Public_Controller {
	
	var $attachment = '';

    public function __construct()
    {
    	parent::__construct();
        

 		
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
		$this->attachment = $this->Attachments->getParticipantAttachmentByType($this->participant->id, 'dropbox');

        //$params['key'] = $this->config->item('dropbox_key');    
		//$params['secret'] = $this->config->item('dropbox_secret');

		$this->params['key'] = '1jf008lpa5xdiew';
		$this->params['secret'] = 'lz8xhcesaog04ln';
		$this->params['access'] = array(
								  	//'oauth_token'=>urlencode($this->session->userdata('oauth_token')),
								  	//'oauth_token_secret'=>urlencode($this->session->userdata('oauth_token_secret'))

									//--------------------- Your Permanent Token Access 
									'oauth_token' => '12csfr6rhnwfa82k',
									'oauth_token_secret' => 'scgpldguci1ozza'
								  );
		
		$this->load->library('dropbox', $this->params);
	
    }
    // Call this method first by visiting http://SITE_URL/example/request_dropbox
    public function request_dropbox()
	{
		$data = $this->dropbox->get_request_token(site_url("example/access_dropbox"));
		$this->session->set_userdata('token_secret', $data['token_secret']);
		redirect($data['redirect']);
	}
	//This method should not be called directly, it will be called after 
    //the user approves your application and dropbox redirects to it
	public function access_dropbox()
	{
		
		//$oauth = $this->dropbox->get_access_token($this->session->userdata('token_secret'));
		
		//$this->session->set_userdata('oauth_token', $oauth['oauth_token']);
		//$this->session->set_userdata('oauth_token_secret', $oauth['oauth_token_secret']);
        //redirect('example/test_dropbox');

	}

	//Once your application is approved you can proceed to load the library
    //with the access token data stored in the session. If you see your account
    //information printed out then you have successfully authenticated with
    //dropbox and can use the library to interact with your account.
	public function index() {			

		// Check if attachment is already existed
		if ($this->attachment) {

			// Redirect Participant already participated
			redirect('dropboxuploader/participated');

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
		//$dbobj = $this->dropbox->account();

		//print_r($this->dropbox->add('Public','uploads/gallery/56e033ef04c59.png',['dropbox']));
        //print_r($this->dropbox->metadata('Public'));
        //print_r($this->dropbox->link('Public/56e8e9f2546b3.png'));
        //print_r($this->dropbox->get('Public', 'uploads/gallery/56e033ef04c59.png', $root=['dropbox']));

        //print_r($this->dropbox->media('Public/56e033ef04c59.png'));
        
        //print_r($dbobj);
		
		// Set Gallery Data
	    $data['gallery'] 		= $this->Attachments->getAllAttachment('dropbox');

		// Set Participated Data
	    $data['attachment'] 	= $this->attachment;

		// Set main template
	    $data['main'] 			= 'dropbox';

	    // Set site title page with module menu
	    $data['page_title'] 	= 'Dropbox Uploader';

		// Load js execution
		$data['js_inline'] 		= "
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
								window.location.href = base_URL + 'dropboxuploader';
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

		  // Variable to catch file upload id
		  var fileupload = document.getElementById('fileupload');

		  // Tracker new object on face detection
		  
		  // Variable to get id of filereader
		  var reader = new FileReader();
		  
		  // Variable to get img tracking id
		  var img = document.getElementById('img_tracking');

		  // Add event listener    
		  fileupload.addEventListener('change', handleFiles, false);

		  // Function for handling files
		  function handleFiles() {        

		      var fileList = this.files; /* now you can work with the file list */							      							     

		      reader.addEventListener('loadend',function loadEndImage(event) {                                    

		          reader.removeEventListener('loadend',loadEndImage,false);

		      });

		      reader.addEventListener('load',function loadImage(event) {

		          var dataURL = reader.result;
		          img.src = dataURL;
		          
		          if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
		            // There is a tweak on firefox and i don't know why
		            setTimeout(function(){
		                //readerFileReturn();
		            },500);

		          } else {
		            //readerFileReturn();
		          }          

		          document.getElementById('submit-button').style.display=\"block\";		

		          reader.removeEventListener('load',loadImage,false);
		      });
		         
		      reader.readAsDataURL(fileList[0]);

		}							

		$('#send_image').click(function(e) {
		    // Prevent own default clicking
		    e.preventDefault();

		    // default form var
		    var userform = $(this).next('.msg');

		    var submit_button = $(this);

		    // canvas.discardActiveGroup();
		    // canvas.discardActiveObject();
		    // canvas.renderAll();

    	  	submit_button.prop(\"disabled\", true);

		      $.ajax({
		         url: 'dropboxuploader/upload_dropbox?type=dropbox',
		         type: 'POST',
		         dataType : 'json', // what type of data do we expect back from the server
		         data: {
		            data: document.getElementById(\"img_tracking\").src,
		            csrf_token: $.cookie('csrf_cookie')
		         },
		         complete: function(data, status) {
		          var msg = data.responseJSON;

		            console.log(msg);
		            
		            //userform.find('.msg').empty();
		            //userform.find('.msg')

		            userform.empty();
		            userform
		            .html('<div class=\"alert alert-danger msg\">'
		            +'<button class=\"close\" data-close=\"alert\"></button>'
		            +msg.result.text+'</div>');       

		            if (msg.result.code === 1) {          
	            	  submit_button.prop(\"disable\",false);
		              setTimeout(function() {
		                // Do something after 5 seconds
		                window.location.href = base_URL + 'dropboxuploader';
		              }, 2000);
		            }

		            if(status=='success') {
		                alert('saved!');
		            }
		            // alert('Error has been occurred');
		         }
		      }).always(function() {
				    submit_button.prop(\"disabled\", true);
			  	});
	   	});";

	    // Load site template
		$this->load->view('template/public/template', $this->load->vars($data));	
	}

	// Redirect if particpant already participated
	public function participated () {

		// Check if attachment is already existed
		if (!$this->attachment) {

			// Redirect Participant already participated
			redirect('dropboxuploader');

		}	

		// Set Gallery Data
	    $data['gallery'] 		= $this->Attachments->getAllAttachment('dropbox');

		// Set Participated Data
	    $data['attachment'] 	= $this->attachment;

	    // Set main template
	    $data['main'] 			= 'dropbox';

	    // Set site title page with module menu
	    $data['page_title'] 	= 'Dropbox Gallery';

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

	public function upload_dropbox() {
		
		//print_r($this->params['access']);
		//exit;		
		//$this->dropbox->get_access_token('G5UlEeYaX9UAAAAAAAAA-dcI8--y_uz5obb2B9tMvPaydsvWTIv7_i3A16ekqptk');		
        //$dbobj = $this->dropbox->account();
		//print_r($this->dropbox->add('Public','uploads/gallery/56e033ef04c59.png',['dropbox']));
        //print_r($this->dropbox->metadata('Public'));
        //print_r($this->dropbox->link('Public/56e8e9f2546b3.png'));
        //print_r($this->dropbox->get('Public', 'uploads/gallery/56e033ef04c59.png', $root=['dropbox']));
        //print_r($this->dropbox->media('Public/56e033ef04c59.png'));        
        //print_r($dbobj);

		// Detect if data sent by POST
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			
			// Get the data sent and replace unwanted string
			$base64img = str_replace('data:image/png;base64,', '', $this->input->post("data"));
			$base64img = str_replace('data:image/jpeg;base64,', '', $base64img);

			// Decode base64 data sent
			$return = base64_decode($base64img);
			$filename = uniqid() . '.png';

			// Generate unique image name 
			$file = 'uploads/' . $filename;

			// Default result empty variable
			$result = '';

			// Put file to upload directory
	    	if (file_put_contents($file, $return)) {
	    		
	    		$this->dropbox->add('Public',$file,['dropbox']);	

	    		$dropbox_file_name = $this->dropbox->media('Public/'.$filename);
	    		
	    		//$dropbox_file_name = $this->dropbox->shares('Public/'.$filename,['short_url'=>false]);	
	    		//$dropbox_file_name = $this->dropbox->metadata('Public/'.$filename);
	    		//print_r($dropbox_file_name->url);
	    		//$link = $this->dropbox->metadata_link($dropbox_file_name->url);
	    		//print_r($link);
        	    //exit;

    			// Send success message 
				$result['result']['code'] = 1;
				$result['result']['text'] = 'Success';				
				$result['result']['file'] = $file;

				$object['participant_id'] 	= $this->participant->id;				
				$object['type'] 			= $this->input->get("type");
				$object['file_name']		= $dropbox_file_name->url;
				$object['status'] 			= 1;
				$object['modified'] 		= time();

				$this->Attachments->setAttachment($object);
				
				@unlink($file);	    		

	    	} else {

				// Send fail message
				$result['result']['code'] = 0;
				$result['result']['text'] = 'Failed';
				$result['result']['file'] = '';

	    	}

			// Return data esult
			$data['json'] = $result;
			
			// Load data into view		
			$this->load->view('json', $this->load->vars($data));	

		}	

	}	
}

/* End of file example.php */
/* Location: ./application/controllers/welcome.php */