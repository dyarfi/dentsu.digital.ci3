<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		
		//Load user
		$this->load->model('Users');
		
		//Load session
		$this->load->model('Sessions');
		
		//Load user permission
		$this->load->model('UserGroupPermissions');
		
		//Put session check in constructor
		$data['user'] = $this->session->userdata('user_session');
				
	}
	
	public function index() {
	    // print_r($this->template);
		// Check if the request via AJAX
		if ($this->input->is_ajax_request()) {
			$this->stat_dashboard();
			return false;
		}
           
		// Load WYSIHTML JS and other JS
		$data['js_files'] = array(
			base_url('assets/admin/plugins/flot/jquery.flot.min.js'),
			base_url('assets/admin/plugins/flot/jquery.flot.resize.min.js'),
			base_url('assets/admin/plugins/flot/jquery.flot.categories.min.js'),
			base_url('assets/admin/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js'));
		
		// Load WYSIHTML CSS and Others
		$data['css_files'] = array(
			base_url('assets/admin/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css'));
		
		// Load Text Editor execution
		$data['js_inline'] = "Index.initCharts(); // Initialize graph";
		
	    // Total users count
	    $data['tusers']			= $this->Users->getCount(1);
		
		// Set class name to view
	    $data['class_name']		= $this->_class_name;
	    
	    // Set module with URL request 
		$data['module_title']	= $this->module;

	    // Set page title
	    $data['title']	= "Dashboard Home";
	    
		// Set admin title page with module menu
		$data['page_title'] = $this->module_menu;
		
	    $this->load->view('admin/dashboard', $this->load->vars($data));
		
	}
        
	public function stat_dashboard() {
            
            // Check if the request via AJAX
            if (!$this->input->is_ajax_request()) {
                exit('No direct script access allowed');		
            }
            
            /*
			var visitors = [
					['01/2013', 500],
					['02/2013', 1500],
					['03/2013', 2600],
					['04/2013', 1200],
					['05/2013', 560],
					['06/2013', 2000],
					['07/2013', 2350],
					['08/2013', 1500],
					['09/2013', 4700],
					['10/2013', 1300],
				];
			 * 
			 */
			
			// User login stats
			$login_stats = $this->Users->getLoginStats();
            if(!empty($login_stats)) {
                    
                $temp_login = array();
                foreach ($login_stats as $login) {
                    $temp_login[] = array($login->last_login,$login->total_login);
                }
                $result['result']['stats_login'] = $temp_login;
				unset($temp_login);
            }
			
			// Session stats
			$session_stats = $this->Sessions->getSessionStats();
            if(!empty($session_stats)) {
                    
                $temp_session = array();
                foreach ($session_stats as $session) {
                    $temp_session[] = array($session->last_activity,$session->total_session);
                }
                $result['result']['stats_session'] = $temp_session;
				unset($temp_session);
            }
			
            // Return data result
            $data['json'] = $result;

            // Load data into view		
            $this->load->view('json', $this->load->vars($data));
	    
	}
}
