<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailchimp extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
        // Load config for controller
        $this->load->config('mailchimp');
        
        // Load Mailchimp Library
		$this->load->library('mailchimp_library');
        
	}
    
	public function index() {
     	
     	// Get camapign list from mailchimp
     	$lists = $this->mailchimp_library->call('campaigns/list');		
		$campaigns = element('data',$lists);

		/* =========== Sending a batch of emails to subscriber lists 

		//Create Batch 
		$batch = array(array( 
		                'email' => array('email'=> 'defrian.yarfi@d3.dentsu.co.id'), 
		                'email_type' => 'html', 		              
		                'merge_vars' => array('fname' => 'Defrian Dentsu', 'lname' => 'Yarfi Digital')
		                )
		        
				);
		
		$subscribe = $this->mailchimp_library->call('lists/batch-subscribe',array(
			'id'=> '789ef76103',
			'batch'=> $batch,
  			'double_optin' => 'false',
            'update_existing' => 'false',
            'replace_interests' => 'false',
            'send_welcome' => 'false'
			));

		print_r($subscribe);

		*/
		
		
		
        // Campaign data
        $data['campaigns'] = $campaigns;
                
		// Set main template
		$data['main'] = 'mailchimp';
				
		// Set site title page with module menu
		$data['page_title'] = 'Mailchimp Campaign';
		
		// Load admin template
		$this->load->view('template/public/template', $this->load->vars($data));
        
    }
    	
}

/* End of file mailchimp.php */
/* Location: ./application/controllers/mailchimp.php */