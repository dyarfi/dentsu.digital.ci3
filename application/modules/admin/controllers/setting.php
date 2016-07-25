<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Class for Setting in Admin
class Setting extends Admin_Controller {
	
	public $_class_name; 
	    
	public function __construct() {
		parent::__construct();

		// Set class name
		$this->_class_name = $this->controller;

		// Load Settings model
		$this->load->model('Settings');
		
		// Load Configuration model
		$this->load->model('Configurations');
		
	}
	
	public function index() {
		
		// Check if the request via AJAX
        if ($this->input->is_ajax_request() && $this->input->post()) {
			// Make sure if this is an ajax request and mode is 1 
			if ($this->input->post('ajax') == true) {
				$object['parameter']	= 'maintenance';
				$object['value']		= $this->input->post('mode');
				$result = $this->Configurations->updateConfiguration($object);
				echo $result;
			}
			exit();
		}
		
		// Load WYSIHTML JS and other JS
		$data['js_files'] = array(base_url('assets/admin/scripts/custom/form-setting.js'));
		
		// Load Text Editor execution
		$data['script_bottom'] = "FormSetting.init();";
		
		// Set data rows
		$data['rows']	= $this->Settings->getAllSetting();
		
		// Set data rows
		$data['configuration']	= $this->Configurations->getConfiguration_ByParam('maintenance');
		
		// Set default statuses
		$data['statuses'] = $this->configs['status'];

		// Set class name to view
		$data['class_name'] = $this->_class_name;
	    
		// Set main template
		$data['main']		= 'settings/setting_index';
		
		// Set module with URL request 
		$data['module_title'] = $this->module;
		
		// Set admin title page with module menu
		$data['page_title'] = $this->module_menu;
									
		// Set default system
		$data['is_system'] = $this->configs['is_system'];
		
		// Load qr code js execution
		//$data['script_bottom'] = "load();setimg('".base_url()."assets/admin/img/')";
		
		// Load admin template
		$this->load->view('template/admin/template', $this->load->vars($data));
	}
        
	public function edit($id=0) {
		
		// Check if param is given or not and check from database
		if (empty($id) || !$this->Settings->getSetting($id)) {
			$this->session->set_flashdata('message','Item not found!');
			// Redirect to index
			redirect(ADMIN. $this->controller . '/index');
		}	
		
		// Default data setup
		$fields	= array(
				'parameter'	=> '',
				'alias'		=> '',
				'value'		=> '',
				'help_text' => '',
				'status'	=> '');
		
		$errors	= $fields;
		
		$this->form_validation->set_rules('parameter', 'Parameter', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alias', 'Alias','trim|required|xss_clean');
		$this->form_validation->set_rules('value', 'Value','trim|required');				
		$this->form_validation->set_rules('status', 'Status','required');
                
		// Check if post is requested		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			// Validation form checks
			if ($this->form_validation->run() == FALSE) {

				// Set error fields
				$error = array();
				foreach(array_keys($fields) as $error) {
					$errors[$error] = form_error($error);
				}

				// Set previous post merge to default
				$fields = array_merge($fields, $this->input->post());						

			} else {

				$posts = array(
								'id'        => $id,
								'parameter'	=> $this->input->post('parameter'),
								'alias'     => $this->input->post('alias'),
								'value'		=> $this->input->post('value'),
								'help_text' => $this->input->post('help_text'),
								'status'	=> $this->input->post('status')
				);
				
				// Set data to add to database
				$this->Settings->updateSetting($posts);

				// Set message
				$this->session->set_flashdata('message','Setting updated');

				// Redirect after add
				redirect(ADMIN. $this->controller . '/index');

			}
		
		} else {	
			
			// Set fields from database
			$fields         = (object) $this->Settings->getSetting($id);
			
		}
		
		// Load WYSIHTML JS and other JS
		$data['js_files'] = array(
			base_url('assets/admin/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js'),
			base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js'),
			base_url('assets/admin/scripts/custom/components-editors.js'));
		
		// Load WYSIHTML CSS and Others
		$data['css_files'] = array(
			base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css'));
		
		// Load Text Editor execution
		$data['js_inline'] = "ComponentsEditors.init();";
		
		// Set Action
		$data['action']     = 'edit';
				
		// Set Param
		$data['param']      = $id;
		
		// Set error data to view
		$data['errors']     = $errors;

		// Set field data to view
		$data['fields']     = $fields;		
			
		// Setting Status Data
		$data['statuses']   = $this->configs['status'];		
		
		// Set class name to view
		$data['class_name'] = $this->_class_name;
	    
		// Set form to view
		$data['main']       = 'settings/setting_form';			
		
		// Set module with URL request 
		$data['module_title']	= $this->module;
		
		// Set admin title page with module menu
		$data['page_title']		= $this->module_menu;
		
		// Set admin template
		$this->load->view('template/admin/template', $this->load->vars($data));
		
	}
        
	public function add() {
		
		//Default data setup
		$fields	= array(
				'parameter'	=> '',
				'alias'		=> '',
				'value'		=> '',	
				'help_text' => '',
				'status'	=> '');
		
		$errors	= $fields;
		
		$this->form_validation->set_rules('parameter', 'Parameter', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alias', 'Alias','trim|required|xss_clean');
		$this->form_validation->set_rules('value', 'Value','trim|required');				
		$this->form_validation->set_rules('status', 'Status','required');
                
		// Check if post is requested
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			// Validation form checks
			if ($this->form_validation->run() == FALSE)
			{
				// Set error fields
				$error = array();
				foreach(array_keys($fields) as $error) {
					$errors[$error] = form_error($error);
				}

				// Set previous post merge to default
				$fields = array_merge($fields, $this->input->post());
			}
			else
			{

				// Set data to add to database
				$this->Settings->setSetting($this->input->post());
				
				// Set message
				$this->session->set_flashdata('message','Setting created!');
				
				// Redirect after add
				redirect(ADMIN. $this->controller . '/index');
				
			}
			
		}	
		
		// Load WYSIHTML JS and other JS
		$data['js_files'] = array(
			base_url('assets/admin/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js'),
			base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js'),
			base_url('assets/admin/scripts/custom/components-editors.js'));
		
		// Load WYSIHTML CSS and Others
		$data['css_files'] = array(
			base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css'));
		
		// Load Text Editor execution
		$data['js_inline'] = "ComponentsEditors.init();";
		
		// Set Action
		$data['action'] = 'add';
				
		// Set Param
		$data['param']	= '';
				
		// Set error data to view
		$data['errors'] = $errors;
				
		// Setting Status Data
		$data['statuses']	= @$this->configs['status'];
		
		// Post Fields
		$data['fields']		= (object) $fields;

		// Set class name to view
		$data['class_name']	= $this->_class_name;
	    
		// Main template
		$data['main']		= 'settings/setting_form';		
	
		// Set module with URL request 
		$data['module_title'] = $this->module;
		
		// Set admin title page with module menu
		$data['page_title'] = $this->module_menu;
		
		// Admin view template
		$this->load->view('template/admin/template', $this->load->vars($data));
				
	}
        
	public function view($id=null){
            
            // Check if data is found and redirect if false
            if (empty($id) && (int) count($id) == 0) {
                    $this->session->set_flashdata('message',"Error submission.");
                    redirect(ADMIN. $this->controller . '/index');
            }

            // Check if Setting data ID is found and redirect if false
            $user = $this->Settings->getSetting($id);
            if (!count($user)){
                    $this->session->set_flashdata('message',"Data not found.");			
                    redirect(ADMIN. $this->controller . '/index');
            }

            // Set Param
			$data['param']	= $id;

            // Listing data
            $data['listing']    = $this->Settings->getSetting($id);		

            // Main template
            $data['main']	= 'settings/setting_view';

            // Set default statuses
            $data['statuses'] = $this->configs['status'];

            // Set class name to view
			$data['class_name'] = $this->_class_name;

            // Set module with URL request 
            $data['module_title'] = $this->module;

            // Set admin title page with module menu
            $data['page_title'] = $this->module_menu;

            // Load admin template
            $this->load->view('template/admin/template',$this->load->vars($data));
    }
    
    public function delete($id){

            // Delete user data
            $this->Settings->deleteSetting($id);

            // Set flash message
            $this->session->set_flashdata('message','Setting deleted');

            // Redirect after delete
            redirect(ADMIN. $this->controller . '/index');

    }
    
    // Action for update item status
    public function change() {	
		if ($this->input->post('check') !='') {
			$rows	= $this->input->post('check');
			foreach ($rows as $row) {
			// Set id for load and change status
			$this->Settings->setStatus($row,$this->input->post('select_action'));
			}
			// Set message
			$this->session->set_flashdata('message','Status changed!');
			redirect(ADMIN.$this->_class_name.'/index');
		} else {	
			// Set message
			$this->session->set_flashdata('message','Data not Available');
			redirect(ADMIN.$this->_class_name.'/index');			
		}
    }
    
}

/* End of file setting.php */
/* Location: ./application/setting/controllers/setting.php */