<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Preset PHP settings
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//set_time_limit(30);

//require_once 'application/libraries/IP2Location/IP2Location.php';

// Standard lookup with no cache
//$loc = new IP2Location('application/libraries/IP2Location/databases/IP-COUNTRY-SAMPLE.BIN', IP2Location::FILE_IO);


//$ip = '8.8.8.8';

// Lookup for single field
//echo 'Country Code: ' . $loc->lookup($ip, IP2Location::COUNTRY_CODE) . '<br />';
//echo 'Country Name: ' . $loc->lookup($ip, IP2Location::COUNTRY_NAME) . '<br />';

// Lookup for all fields
//$record = $loc->lookup($ip, IP2Location::ALL);

//echo '<pre>';
//print_r($record);
//echo '</pre>';

class Home extends Public_Controller {

	public function __construct() {
		parent::__construct();
		
		// Load User related model in admin module
		$this->load->model('admin/Users');
		$this->load->model('admin/UserProfiles');
		
		// Load Setting data
		$this->load->model('admin/Settings');
		
		// Load Career data
		$this->load->model('career/Careers');

		// Load User related model in admin module
		$this->load->model('page/Pagemenus');
		$this->load->model('page/Pages');
		
		/*
		// Load IP2Location Class file without calling the _construct method
		$this->load->file('application/libraries/IP2Location/ip2location.php');
		
		$loc = new IP2Location('application/libraries/IP2Location/databases/IP2LOCATION-LITE-DB11.BIN', IP2Location::FILE_IO);
		
		$ip = '139.0.26.20';

		// Lookup for single field
		echo 'Country Code: ' . $loc->lookup($ip, IP2Location::COUNTRY_CODE) . '<br />';
		echo 'Country Name: ' . $loc->lookup($ip, IP2Location::COUNTRY_NAME) . '<br />';
		
		// Lookup for all fields
		$record = $loc->lookup($ip, IP2Location::ALL);

		echo '<pre>';
		print_r($record);
		echo '</pre>';
		
		exit;
		 * 
		 */
		
		//print_r($this->session->userdata['session_id']);
		//print_r('<br/>');
		//print_r($this->session);

		//$this->template->set_theme('default');
		
		
	}
	
	public function index() {
		
					
		// Set site title page with module menu
		$data['page_title'] = $this->config->item('site_name') .' | '. $this->Settings->getByParameter('title_default')->value;
		
		// Set facebook link data
		$data['vacancies']	= $this->Careers->getAllCareer();

		// Set Gallery Data
		$data['gallery'] 		= $this->Attachments->getAllAttachment('fabric');
				
		// Set facebook link data
		$data['facebook']	= $this->Settings->getByParameter('socmed_facebook');
				
		// Set twitter link data
		$data['twitter']	= $this->Settings->getByParameter('socmed_twitter');
		
		// Set google link data
		$data['google']		= $this->Settings->getByParameter('socmed_gplus');
		
		// Set contact email info data
		$data['email_info']	= $this->Settings->getByParameter('email_info');		
		
		// Set contactus address info data
		$data['contactus_address']	= $this->Settings->getByParameter('contactus_address');		
		
		// Set main template
		$data['main'] = 'home';

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
	
	public function menu ($menu='') {
		
		// Set menu data
		$data['menu'] = $menu;
		
		// Set pages data
		$data['pages'] = $this->Pagemenus->getPagesByMenu($menu);
		//exit('asdf');
		// Set main template
		$data['main'] = 'home';
		
		// Load admin template
		$this->load->view('page', $this->load->vars($data));
	}
	
	public function page ($menu='',$page='') {
		
		// Set menu data
		$data['menu'] = $menu;
		
		// Set pages data
		$data['page'] = $this->Pages->getPageByName($page);
		
		//print_r($data['pages']);
		
		// Set main template
		//$data['main'] = 'page';
		
		// Load admin template
		$this->load->view('page_detail', $this->load->vars($data));
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */