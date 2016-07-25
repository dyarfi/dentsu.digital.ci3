<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Class for Module List
class ModuleList extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
				
		//Load user related model
		$this->load->model('ModuleLists');
		$this->load->model('UserGroups');		
		$this->load->model('UserGroupPermissions');
		$this->load->model('ModulePermissions');				
		
		// Load Module List
		$this->modules			= $this->db->where('parent_id',0)->get('module_lists')->result();
		
		// Load User Group
		$this->user_group		= $this->db->where('id !=',1)->where('id !=',99)->where('status',1)->get($this->db->dbprefix('user_groups'))->result();
		
		// Load User Group Permission
		$_user_group_permission		= $this->db->where('group_id !=',1)->where('group_id !=', 99)->get('group_permissions')->result();
				
		$buffers = array();
		foreach ($_user_group_permission as $key) {
			$buffers[$key->group_id][$key->permission_id] = $key;
		}
		
		$this->user_group_permission = $buffers;
		unset($buffers);
		
		// Load Module Permission List
		$this->db->select()->from('module_permissions')->order_by('module_link','ASC');
		
		// Load into objects
		$this->module_permission = $this->db->get()->result();
				
	}
	
	public function index() {		
		
		/** Table sorting **/
		$table_headers	= array('class_name' => 'Module');
		foreach($this->user_group as $row) {
			$table_headers['group_id_'.$row->id]	= ucwords($row->name);
		}
		
		/** Execute list query **/
		$listings	= $this->db->where('parent_id',0)->order_by('id','ASC')->get('module_lists')->result();
		
		$total_rows	= count($listings);				
		
		/** Views **/
		
		// Load js for administrator login
		$data['js_files'] = array(base_url('assets/admin/scripts/custom/form-module.js'));
		
		// Load JS execution
		$data['js_inline'] = "FormModule.init();";
		
		$data['user_group']		= $this->user_group;
		$data['module_permission']	= $this->module_permission;
		$data['user_group_permission']	= $this->user_group_permission;
		$data['listings']		= $listings;
		
		$data['table_headers']		= $table_headers;
		
		$data['statuses']	= array('Active'=>'active','Inactive'=>'inactive');
		
		$data['main']		= 'users/module_list';
				
		// Set module with URL request 
		$data['module_title'] = $this->module;
		
		// Set admin title page with module menu
		$data['page_title'] = $this->module_menu;
		
		$this->load->view('template/admin/template', $this->load->vars($data));
				
	}
	
	public function add(){
		
		//Default data setup
		$fields = array(
					'name'=>'',
					'backend_access'=>'',
					'full_backend_access'=>'',
					'status'=>'');
		
		$errors = $fields;
		
		// Set form validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status','trim|required|xss_clean');
		
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

				// Set data to add to database
				$this->UserGroups->setUserGroup($this->input->post());

				// Set message
				$this->session->set_flashdata('message','User Group created!');

				// Redirect after add
				redirect('admin/usergroup');

			}
		}	
							
		// Set Action
		$data['action'] = 'add';
				
		// Set Param
		$data['param']	= '';
				
		// Set error data to view
		$data['errors'] = $errors;

		// Set field data to view
		$data['fields'] = $fields;
		
		// Group Status Data
		$data['statuses']	= array('Active'=>1,'Inactive'=>0);	
		
		// Post Fields
		$data['fields']		= (object) $fields;
		
		// Main template
		$data['main']		= 'users/usergroups_form';		
		
		// Admin view template
		$this->load->view('template/template', $this->load->vars($data));
		
	}
	
	public function edit() {
		
		// Defined data fields
		$fields		= $_POST;
		
		// Defined array to update
		$array		= array();
		
		// Make sure it's all array from data module_permission field
		if(is_array($fields['module_permission']['group_id'])) {
		    // Loop data module_permission for update recursion
		    foreach ($fields['module_permission']['group_id'] as $key => $val) {
				foreach ($val as $k => $v) {

					$data = array(
						'id'    => $k,
						'value' => $v,
						'modified' => time()
					 );

					// Load Class to update data
					$this->UserGroupPermissions->updateUserGroupPermission($data);
				}
		    }
		}
		
		// Set flash message for updated module listing
		$this->session->set_flashdata('message','Module List Updated');
		
		// Redirect to controller
		redirect(ADMIN . 'modulelist/index');
	}
		
	public function trash() { 
		
		// Check only superadmin group can access this method
		if ($this->session->userdata('user_session')->group_id == 1) {
			
			// Empty all user permission method
			$return = $this->ModuleLists->emptyPermission();
			
			// Set flash message for updated module listing
			$this->session->set_flashdata('message','User permission emptied, Logout for continue');
		
			// Redirect to controller
			redirect(ADMIN . 'modulelist/index');
			
		}
		
	}
}