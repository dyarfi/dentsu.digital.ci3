<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {
	
	protected $module_list = '';
	protected $module_function_list = '';
	
	protected $controller = '';
	protected $action = '';
	
	public $user = '';
	public $previous_url = '';
	
	public $setting ='';
	public $i18ln = '';
	
	protected $template = '';
		
	public function __construct() {
		parent::__construct();	
		
		// Load Session library
		$this->load->library('Acl');		
		$this->load->library('session');
        
        // Load Helper Library
        // $this->load->helper('csv');
		
		// Load Admin config
		$this->configs			= $this->load->config('admin/admin',true);			
		
		// Load Configuration Model
		$this->load->model('admin/Configurations');
		
		// Set default template
		//$theme = $this->Configurations->getConfiguration('theme')->value;
		//$this->template = ($theme) ? $theme : 'template';
		
		// Load Setting Model
		$this->load->model('admin/Settings');
		
		// Load Language Model
		$this->load->model('admin/Languages');
		
		// Set i18ln for the default language
		$this->i18ln = $this->Languages->getDefault();
		
		// Session destroy
		//$this->session->sess_destroy();
		
		// Set config value for default
		$this->config->set_item('language', 'english');
		
		// Set user data lists from login session		
		$this->user				= $this->acl->user();

		// Load user module and function lists
		$this->module_list		= json_decode($this->session->userdata('module_list'),TRUE);
		$this->module_function_list	= json_decode($this->session->userdata('module_function_list'),TRUE);		
		
		$this->module			= @$this->uri->segments[1];
		$this->controller		= @$this->uri->segments[2];
		$this->action			= @$this->uri->segments[3];
		$this->param			= @$this->uri->segments[4];																		
		$this->module_request	= $this->controller . '/' .$this->action;	
		
		$this->module_menu		= self::check_module_menu($this->module_request);
		
		// Check if user data is true empty and redirect to authenticate
		if (!$this->user 
				&& strpos($this->uri->uri_string(), ADMIN) == 0 
					&& $this->uri->segment(2) !== 'authenticate') {
			// Destroy all session
			$this->acl->session_destroy();
			// Redirect to authentication if direct access to all classes
			redirect(ADMIN.'authenticate/logout');
		}
		
		// Check for previous url from referrer
		if (strstr($this->session->userdata('prev_url'), ADMIN) !== '' 
				&& $this->session->userdata('prev_url') != $this->session->userdata('curr_url')) {
			// Set Previous URL to current URL
			$this->session->set_userdata('prev_url', $this->session->userdata('curr_url'));
		} else {
			// Set current URL from current url
			$this->session->set_userdata('curr_url', $this->uri->uri_string());
		}	
		
		// Set previous URL from previous url session		
		$this->previous_url	= $this->session->userdata('prev_url');
		
		// Check user access list
		self::check_module_permission($this->controller, $this->action, $this->param);	
		
		//Set default themes template
		//$this->output->set_template('default/template');
		$this->output->set_template('gentelella/template');
		
	}
	
	/**
	* Checking access permission stored in database and return the accessible function
	*
	* @access	public
	* @param	array
	* @return	true/false
	*/
	public function check_module_permission ($controller='',$action='', $param='') {
		
		$accessible		= FALSE;
		
		$module_list 	= $this->module_list;

		$module_function_list 	= $this->module_function_list;				
		
		// Check again for necessaries variables
		if ($module_list && $module_function_list && strstr($this->uri->uri_string, ADMIN) !='') {
			
			$url_to_match = '';
			
			if ($controller != '' && $action != '') $url_to_match = $controller .'/'. $action;	

			$function_modules 	= array_merge_recursive($module_list,$module_function_list);
									
			// Define all accessible function action into TRUE
			foreach ($function_modules as $modules) {
												
				if (!empty($modules[$url_to_match])) {
					
					$accessible = TRUE;					

				}
			}	
			
			// Define controller or post that don't have to be checked
			if ($accessible === FALSE 
					// For Bypassing admin-panel reload_captcha method in all classes
					&& $action != 'reload_captcha'					
					// For Bypassing admin-panel forgot_password method in all classes
					&& $action != 'forgot_password'
					// For Bypassing admin-panel ajax method in all classes
					&& $action != 'ajax'
					// For Bypassing admin-panel ordering method in all classes
					&& $action != 'order'
					// For Bypassing admin-panel download method in all classes
					&& $action != 'download'
					// For Bypassing authentication controller in @admin-panel/authentication
					&& $controller != 'authenticate'
					// For Bypassing redirect in each @controller provides
					&& $controller != 'baseadmin') {
				
				if ($this->input->is_ajax_request()) {
					// Send permission message to client
					echo 'You do not have permission to '.$action;
					exit;
				}
				
				$message = $param ? str_replace('/', '', $param) : $action;
			
				if ($this->input->is_ajax_request()) {
					// Send permission message to client
					echo 'You do not have permission to '.$message;
					exit;
				}
				
				/* 
				 * Send permission message to client via session
				 * Set session 'acl_error' if action not accessible for users
				 */

				
				$this->session->set_flashdata('message', 'You do not have permission to '.$message.'!');
				redirect(ADMIN . $this->controller. '/index');
			} 

		} 

	}
	
	/**
	* Checking and load the current controller module menu name
	*
	* @access	public
	* @param	array
	* @return	string
	*/
	public function check_module_menu ($module_menu = '') {
		
		if (empty($module_menu)) {
			return;
		}
		$menu_name = '';
		
		// Check if module list is available
		if (!empty($this->module_function_list)) {
		    foreach ($this->module_function_list as $modules => $module) {
				if (!empty($module[$module_menu])) {
					$menu_name = $module[$module_menu];
				}			
		    }
		}
		return $menu_name;
		
	}
    
    /**
	* Export data from database tables to csv 
	*
	* @access	public
	* @param	array
	* @return	string
	*/
    public function export_csv ($table='', $name='', $force='') {
        
        $filename = "export-".$this->_class_name .'-'. date("Y-m-d_H:i:s") . ".csv";
        
        $array = array(
            array('Last Name', 'First Name', 'Gender'),
            array('Furtado', 'Nelly', 'female'),
            array('Twain', 'Shania', 'female'),
            array('Farmer', 'Mylene', 'female')
        );
        
        //$asdf = array('asdf','dsfg');
        print_r(array_to_csv($array,$filename));
    }
	
}