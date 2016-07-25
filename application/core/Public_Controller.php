<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Public_Controller extends MY_Controller {
    
    // Set public controller variable
	var $session_id = '';

	// Set empty participant data
	var $participant = '';

	// Set public logged in
	var $logged_in = true;


    
    public function __construct() {
		
        parent::__construct();
        
        // Get libraries from system
        $this->load->library('user_agent');
		//$this->load->library('Template');

		// Load site models
		$this->load->model('admin/Configurations');
		$this->load->model('admin/ServerLogs');
		$this->load->model('admin/Settings');
        $this->load->model('participant/Participants');        
        $this->load->model('participant/Attachments');
		
		// Set default site copyright
		$this->config->set_item('title_name', $this->Settings->getByParameter('title_name')->value);
		$this->config->set_item('site_title', $this->Settings->getByParameter('title_default')->value);
		$this->config->set_item('copyright', $this->Settings->getByParameter('copyright')->value);

		// Set site status default
		self::getSiteStatus();
		
		// Set site user access logs
		self::setAccessLog(1);
		
		if($this->config->item('site_open') === FALSE)
        {
            show_error('Sorry the site is shut for now for maintenance.',false);
        }
	
        if( $this->agent->is_mobile() )
        {
            /*
             * Use my template library to set a theme for your staff
             *     http://philsturgeon.co.uk/code/codeigniter-template
             */
            //$this->template->set_theme('mobile');
		} else {
			// $this->template->set_theme('default');
		}

		// Set participant session objects
		//$this->participant = $this->session->userdata('participant');
		//print_r(rand(1,300));
		//exit;
		
		//$user->id 			= 1;
		//$user->status 		= 0;
		//$this->participant  	= $user;

		if (! $this->session->userdata('participant')) {

			// Set public to logged in
			$this->logged_in = false;

		} else {
			
			// Set temporary participant data
			$this->participant = $this->session->userdata ('participant');

		}

		//print_r($this->session->unset_userdata('participant'));

		//print_r($this->participant);

		//$this->session->set_userdata('participant',$this->participant);

		//$this->template->theme  	= 'default';
		//$this->template->title  	= 'Page Title';
		//$this->template->meta_data  = array();
		//$this->template->layout     = 'template/public/site_template';
		//print_r($this->template);

    }
	
	protected function getSiteStatus() {
		
		// Get value from tbl_configurations for maintenance
		if ($this->Configurations->getConfiguration_ByParam('maintenance')) {
			
			// Set config value for default
			$this->config->set_item('site_open', FALSE);
			
		}
		
	}
	
	protected function setAccessLog($public='') {
		
        // Set site session id
        $this->session_id = $this->session->userdata('session_id');
        
		// Set user agents and platform
		$user_agents['user_agent']	= $this->agent->agent;
		$user_agents['platform']	= $this->agent->platform;
		$user_agents['browser']		= $this->agent->browser;
        $ip_address = $this->input->ip_address();
        
		if ($public) {
			// Set ServerLog data
			$object = array(
				'session_id'	=> $this->session_id,
				'url'			=> base_url(uri_string()),
				'user_id'		=> @$object['user_id'],	
				'status_code'	=> $status_code[http_response_code()],	
				'bytes_served'	=> @$object['bytes_served'],	
				'total_time'	=> $this->benchmark->marker['total_execution_time_start'],	
				'ip_address'	=> $ip_address,	
				'geolocation'	=> '',
				'http_code'		=> http_response_code(),	
				'referrer'		=> ($this->agent->is_referral()) ? $this->agent->referrer() : '',			
				'user_agent'	=> json_encode($user_agents),
				'is_mobile'		=> $this->agent->is_mobile,
				'status'		=> 1,
				'added'			=> time()
			);            
		}
        
		// Set value for ServerLogs
		$this->ServerLogs->setServerLog($object);
	}
	
}