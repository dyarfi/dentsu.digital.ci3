<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Public_Controller {

	public function __construct() {
		parent::__construct();
		
		// Load user related model in admin module
		$this->load->model('admin/Users');
		$this->load->model('admin/UserProfiles');
		
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

	}
	
	public function index() {
		
		// Check if participant is already existed
		if (!$this->participant) {

			// Redirect Participant already participated
			redirect('user/register');

		}		

		// JS Inline
		$data['js_files'] = ['form_step'=>['form_step.js']];

		// Set main template
		$data['main'] = 'users';
				
		// Set site title page with module menu
		$data['page_title'] = 'User';
		
		// Load admin template
		$this->load->view('template/public/template', $this->load->vars($data));
		
	}

	public function register() {

		if ($this->input->is_ajax_request()) {

			// Define initialize result
			$result['result'] = '';

			// Default data setup
			$fields	= array(
				'name' => '',
				'email' => '',
				'phone' => '',
				'address' => ''
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
					// Set previous post merge to default
			    	$fields = array_merge($fields, $this->input->post());
			    	
			    	// Set default participant data
					//$participant = $this->Participants->getByEmail($this->input->post('email'));

					// Set participant data to session
					//$this->session->set_userdata('participant', $participant);

					$result = [
								'name'		=> @$fields['name'],								
					            'email'		=> @$fields['email'],
					            'phone'		=> @$fields['phone'],
					            'address'	=> @$fields['address'],
					            'status'	=> 'publish'
					            ];

					$participant = $this->Participants->setParticipant($result);

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

		// JS Inline
		$data['js_files'] = ['form_step'=>['public/js/form_step.js']];

		// Set main template
		$data['main'] = 'user_register';
				
		// Set site title page with module menu
		$data['page_title'] = 'User Register';
		
		// Load admin template
		$this->load->view('template/public/template', $this->load->vars($data));
		
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */