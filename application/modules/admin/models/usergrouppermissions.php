<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Class for User Permission
class UserGroupPermissions Extends MY_Model {
	// Table name for this model
	public $table = 'group_permissions';
	public $permission;
	
	public function __construct(){
	    // Call the Model constructor
	    parent::__construct();

	    $this->load->model('Users');
	    $this->load->model('UserGroups');

	    // Set default db
	    $this->db = $this->load->database('default', true);		
	    // Set default table
	    $this->table = $this->db->dbprefix($this->table);			

	}
	
	public function install () {
		$insert_data	= FALSE;

		if (!$this->db->table_exists($this->table)) {
			$insert_data	= TRUE;

			$sql	= 'CREATE TABLE IF NOT EXISTS `'. $this->table .'` ('
					. '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,'
					. '`permission_id` INT(11) NOT NULL,'
					. '`group_id` INT(11) NOT NULL,'
					. '`value` SMALLINT(1) NOT NULL,'
					. '`added` INT(11) NOT NULL,'	
					. '`modified` INT(11) NOT NULL,'	
					. 'INDEX (`id`) '
					. ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';
	
			$this->db->query($sql);
			
		}
		
		// Check if table exists
		if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0 , 1;')) {
			// Set insert data to TRUE
			$insert_data	= TRUE;
		}	
		/*
		// Set insert data if TRUE
		if ($insert_data) {
			$sql	= 'INSERT INTO `'.$this->table.'` '
					. '(`id`, `permission_id`, `level_id`, `value`, `added`, `modified`) '
					. 'VALUES '
					. '(NULL, \'superadmin\', \'356a192b7913b04c54574d18c28d46e6395428ab\', \'Super Administrator\', 1, 1, '.time().', \'active\', '.time().', 0), '
					. '(NULL, \'administrator\', \'12506e739378348ec662bb015bfd2288362dcc1c\', \'Administrator\', 2, 1, '.time().', \'active\', '.time().', 0), '
					. '(NULL, \'user@testing.com\', \'12506e739378348ec662bb015bfd2288362dcc1c\', \'User\', 99, 0, '.time().', \'active\', '.time().', 0)';

			if ($sql) $this->db->query($sql);
		}
		*/
	    return $this->db->table_exists($this->table);
	}
	
	public function getModuleList($id=null){
		$data = array('id'=>$id);
		$result = '';
		$Q = $this->db->get_where('module_lists',$data);
			if ($Q->num_rows() > 0){
				//print_r($Q->result_object());
				//exit;
				foreach ($Q->result_object() as $row){
					$result[] = $row;
				}
			}
		$Q->free_result();
		return $result;
	}
	
	public function getModulePermissions($id=null){
		$data = array('id'=>$id);
		$result = '';
		$Q = $this->db->get_where('module_permissions',$data);
			if ($Q->num_rows() > 0){
				//print_r($Q->result_object());
				//exit;
				foreach ($Q->result_object() as $row){
					$result[] = $row;
				}
			}
		$Q->free_result();
		return $result;
	}
	
	public function getUserGroupPermissions($user_group=null){
		$data = array('group_id'=>$user_group,'value'=>1);
		$result = '';		
		$Q = $this->db->get_where('group_permissions',$data);
			if ($Q->num_rows() > 0){				
				foreach ($Q->result_object() as $row){
					$result[] = $row;
				}
			}
		$Q->free_result();
		return $result;
	}
	
	public function getAllUserGroupPermissions($user_group=null){
		$data = array('group_id'=>$user_group);
		$result = '';
		$Q = $this->db->get_where('group_permissions',$data);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row){
					$data[] = $row;
				}
			}
		$Q->free_result();
		return $result;
	}
	
	public function setUserGroupPermissions($object=null) { }
	
	public function updateUserGroupPermission($array) {	
	    
	    // Update Setting data             
	    $this->db->where('id', $array['id']);
	    // Return last insert id primary	    
	    $update = $this->db->update($this->table, $array);					
	    // Return last insert id primary
	    return $update;
	    
	}
	
	public function setUserGroupPages($pages=null,$allowed_groups=null) {
	    if (is_array($allowed_groups) && is_array($pages)) {
		    $user_group = $allowed_groups;
		    $uri = array();
		    for($i=0;$i<$this->uri->total_segments();$i++) {
			    //print_r($this->uri->segment($i + 1)); //exit();
			    if(empty($uri[0])) $uri[0] = 'index';
			    $uri[$i] = $this->uri->segment($i + 1);

			    //print_r($this->uri->segment($i + 1));
			    //print_r($uri[$i]);

			    if(in_array($uri[$i],$pages)){
				    //Checking user auth
				    $this->isAuthorized($user_group);
			    } else {
				    //Go to home if false
				    //$this->session->set_flashdata('auth_message', 'You do not have that authorization.');
				    //redirect($uri[0]);
				    //return false;
			    }
		    }
	    }
	    return true;
	}
	
	public function delete_by_permission_id($permission_id = '') {

		if ($permission_id  == '')
			return false;

		// Check module id
		$this->db->where('permission_id', $permission_id);
		
		// Delete modulelists form database
		return $this->db->delete($this->table);
	
	}

	public function isAuthorized($user_group=null) {
	    if ($this->permission && in_array($this->permission, $user_group)) {
		    //Set true if exists
		    return true;
	    } 
	}
	
	public function getModuleFunction($group_id = '') {
		
		// Check initialize level id
		if($group_id == '') {
			// Return blank array
			return array();
		}	
		
		// Set default loaded modules
		$modules			= array();
		
		// Check admin url
		$where_cond			= array('id'	=> $group_id);
		
		// Set user permissions
		$user_permission	= $this->db->get_where($this->db->dbprefix('user_groups'), $where_cond, 1)->result();

		// Check backend permission
		if(!$user_permission[0]->backend_access) {
			// Set flash alert to session
			$this->session->set_flashdata('flashdata', 'You have no access');
			// Redirect if have no access to backend / admin-panel
			redirect(ADMIN . 'authenticate/noaccess');
		}
		
		// Load user admin menu modules
		$item = $this->load->config('modules', TRUE);		
		$modules['Admin']		= $item['admin_list.module_function'];
		
		// Check full backend permission
		if ($user_permission[0]->full_backend_access) {
			// Set admin neccesary module functions
			$modules['Module']	= $item['module_list.module_function'];
		}
		
		// Set default return
		$return_object	= TRUE;

		// Check for level id
		if ($group_id == '') {
			// Set FALSE if level id not found
			$return_object	= FALSE;
		}
		
		// List all user level permissions
		$user_permissions = $this->db->get_where($this->table, array('group_id'=>$group_id,'value'=>1))->result();
		// Temp of array
		$buffers = array();
		
		// Loops for user_permission data 
		foreach ($user_permissions as $key) {
			
			// List all module_permissions based on permission id at user_level_permission
			$module_functions = $this->db->get_where('module_permissions', array('id'=>$key->permission_id))->result();
			
			// Loops for module_functions data 
			foreach ($module_functions as $val) {
				// List all module_list based on module id at module_permission
				$class_names		= $this->db->get_where('module_lists', array('id'=>$val->module_id))->result();
				// Loops for module_names data 
				foreach($class_names as $module) {
					// Set temporary data in place
					$buffers[ucfirst($module->module_name)][$val->module_link] = $val->module_name;
				}				
				// Return all computed data of array permissions and module lists available 
				$modules	= array_merge($modules,$buffers);
								
			}
			
		}	
				
		unset($buffers);
		
		return $modules;
	}
}