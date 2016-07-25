<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Model lists
class ModuleLists Extends MY_Model {
	// Table name for this model
	public $table = 'module_lists';

	public function __construct(){
	    // Call the Model constructor
	    parent::__construct();		

	    // Call related models
	    $this->load->model('admin/ModelLists');
	    $this->load->model('admin/ModulePermissions');
		$this->load->model('admin/UserGroupPermissions');

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
				    . '`parent_id` INT(11) NOT NULL,'
				    . '`module_name` VARCHAR(255) NOT NULL, '
				    . '`module_link` VARCHAR(255) default NULL, '
				    . '`order` INT(11) NOT NULL,'
				    . 'INDEX (`id`) '
				    . ') ENGINE=MYISAM DEFAULT CHARSET=utf8';

		    $this->db->query($sql);
	    }
		
	    return $this->db->table_exists($this->table);
	}

	/*
	public function load_by_name ($name) {
	    
	    $where_cond	= array('module_name' => $name);

	    $objects	= $this->db->get_where($this->table,$where_cond,1)->result();

	    return !empty($objects[0]) ? $objects[0] : FALSE;
	}
	
	public function load_by_link ($link) {
	    
	    $where_cond	= array('module_link' => $link);

	    $objects		= $this->find($where_cond, '', 1);

	    return !empty($objects[0]) ? $objects[0] : FALSE;
	}
	
	public function parent_level_module ($id = '') {
	    
	    if ($id == '')
		    $id	= $this->id;

	    $where_cond	= array('id'	=> $id);
	    $module		= $this->find($where_cond, '', 1);

	    if (!isset($module[0]))
		    return FALSE;

	    return $module[0]->parent_id;
		
	}
	*/

	public function getModules ($user_group) {
	    if($user_group == '')
		    return array();

	    $modules		= array();

	    // Check admin url
	    $where_cond		= array('id'	=> $user_group);
	    $user_permission	= $this->db->get_where($this->db->dbprefix('user_groups'), $where_cond, 1)->result();

	    // Check backend permission
	    if(!$user_permission[0]->backend_access) {
		    // Set flash message to disabled account
		    $this->session->set_flashdata('flashdata', 'Your account has no access!');
		    // Redirect back to login
		    redirect(ADMIN . 'authenticate/login');
	    }
	    // Load user admin menu modules
	    $item = $this->load->config('modules', TRUE);	
	    $modules['Admin'] = $item['admin_list.module_menu'];

	    // Check full backend permission
	    if ($user_permission[0]->full_backend_access) { 
		    // Load user module menu function
		    $modules['Module'] = $item['module_list.module_menu'];	

	    }
	    								
	    $modules_perm		= $this->UserGroupPermissions->getModuleFunction($user_group);		
	    $modules_cols		= array_keys($modules_perm);

	    $where_cond			= array();
	    if(is_array($modules_cols)) {
		    $buffers = array();
		    foreach ($modules_cols as $cols) {
			    $buffers[]	= strtolower($cols);
		    }
		    $where_in		= $buffers;	

	    }

	    $this->db->where('parent_id', 0);
	    $this->db->where_in('module_name',$where_in);		
	    $this->db->order_by('order','ASC');

	    $module_lists = $this->db->get($this->table)->result();

	    if(count($module_lists) != 0) {
		    foreach($module_lists as $module) {

			    $class_name	= $module->module_name;

			    $this->db->where('parent_id', $module->id);
			    $this->db->order_by('order','ASC');

			    $menu_modules	= $this->db->get($this->table)->result();

			    $buffers	= array();

			    if(count($menu_modules) != 0) {
				    foreach ($menu_modules as $menu) {
					    $buffers[$menu->module_link] = $menu->module_name;
				    }
			    }

			    $modules[ucfirst($class_name)] = $buffers;

			    unset($buffers);

		    }
	    }

	    return $modules;
	}	
	
	public function module_check () {
	    $modules	= array();

	    // List all custom modules		
	    $directory[] = Modules::lists('./application/modules');				

	    $config_module = array();

	    // Loop to get module name			
	    foreach ($directory as $row) {
		    $config_module = array_keys($row);
	    }

	    // Check config module
	    if(is_array($config_module) && count($config_module) > 0) {			

		    // List DB module
		    $module_list	= array();

		    $module_db		= $this->db->get_where($this->table, array('parent_id' => 0))->result();

		    $user_groups	= $this->db->get_where($this->db->dbprefix('user_groups'), array('status' => 1))->result();

		    $buffers		= array();

		    if(is_array($module_db) && count($module_db) != 0) {

			    foreach($module_db as $module) {
				    $buffers[$module->id]	= $module->module_name;
			    }

			    $module_list	= $buffers;
			    unset($buffers);
		    }		

		    $new_module_perm_idx = '';
		    $new_module_perm_fnc = '';

		    foreach($config_module as $row) {

			    // Mark for main site modules to not included
			    if($row	!= 'site' && !empty($row)) {

					    // Check new module and install it	
					    if(!in_array($row, $module_list)) {													

						    // Check if config per module existed
						    if(is_dir(APPPATH.'modules/'.$row)) {

							    $config		= $this->load->config('modules',TRUE);
			
							    // Model install
							    $models = @$config['modulelist'][ucfirst($row)]['models'];

							    if (!is_array($models)) {
								    continue;
							    }

							    $this->db->select('*')
									    ->from($this->table)
									    ->where('parent_id',0)
									    ->order_by('order','DESC')
									    ->limit(1);

							    $module_last_order	= $this->db->get()->result();

							    $i	= (isset($module_last_order[0])) ? $module_last_order[0]->order + 1 : 0;							
							    $params		= array('parent_id'	=> 0,
										    'module_name'	=> $row,
										    'module_link'	=> '#',
										    'order'		=> $i);

							    // Add module new
							    $this->db->insert($this->table,$params);
							    $module_id	= $this->db->insert_id();

							    unset($params);		

							    foreach ($models as $model => $val) {

								// Get class name for pre install
								$objects		= $this->load->model($val);

								// Check if install method is exists
								if (method_exists($objects, 'install')) {

									// Install all available modules
									$objects->install();

									// Add to modules to model list
									$params = array('module_id' => $module_id,
											'model'	=> $val);

									// Add new model lists
									$this->db->insert($this->db->dbprefix('model_lists'), $params);
									$new_module_list[] = $this->db->insert_id();
								}

								unset($objects, $params);
							    }

							    // Module Menu Check
							    $module_menu		= @$config['modulelist'][ucfirst($row)]['module_menu'];

							    if(is_array($module_menu)) {
								    $menu_order		= 0;
								    foreach($module_menu as $menu => $menu_name) {

									    $params		= array('parent_id'	=> $module_id,
												    'module_name'	=> $menu_name,
												    'module_link'	=> $menu,
												    'order'		=> $menu_order);

									    // Add module
									    $this->db->insert($this->table,$params);
									    $new_module_function[] = $this->db->insert_id();

									    // Set module_id var
									    $params['module_id'] = $params['parent_id'];

									    // Unset parent_id var
									    unset($params['parent_id']);

									    // Adding initial controller index to module permission
									    $this->db->insert($this->db->dbprefix('module_permissions'), $params);
									    $new_module_perm_idx[] = $this->db->insert_id();

									    $menu_order++;
								    }
								    unset($params);
							    }

							    // Module Function Check
							    $module_function	= @$config['modulelist'][ucfirst($row)]['module_function'];

							    if(is_array($module_function)) {
								    $function_order	= $menu_order;
								    foreach($module_function as $function => $function_name) {
									    $this->db->select('*')->from($this->table)->where('module_name',$function_name);										if (!$this->db->get()->result()) {											
									    $params		= array('module_id'	=> $module_id,
												    'module_name'	=> $function_name,
												    'module_link'	=> $function,
												    'order'		=> $function_order);

									    // Adding action controller to module permission
									    $this->db->insert($this->db->dbprefix('module_permissions'), $params);
									    $new_module_perm_fnc[] = $this->db->insert_id();

									    $function_order++;
									    }
								    }
								    unset($params);
							    }

							    $i++;
						    }											

					    }

			    }	

		    }	

		    if (!empty($new_module_perm_idx) && !empty($new_module_perm_fnc)) {

			    $new_module_permission = array_merge($new_module_perm_idx, $new_module_perm_fnc);

			    // Check user group permission for a new modules just installed
			    if (!empty($new_module_permission) && is_array($new_module_permission)) {
				    foreach ($user_groups as $groups) {
					    foreach($new_module_permission as $new_permission) {

						    if($groups->id == 1 || $groups->id == 2) {
							    $value	= 1;
						    } else { 
							    $value	= 0;
						    }

						    unset($params);

						    $params		= array('permission_id'	=> $new_permission,
									    'group_id'		=> $groups->id,
									    'value'		=> $value,
									    'added'		=> time(),
									    'modified'		=> 0);

						    // Adding user group permission to database
						    $this->db->insert($this->db->dbprefix('group_permissions'), $params);
						    $user_group_permission = $this->db->insert_id();

					    }
				    }
			    }

		    }
			
			/*********** NEED TO CHECK THIS ONE OUT ************/
			
			// Check deleted module
			$deleted_module	= array_diff($module_list, $config_module);

		    if(count($deleted_module) != 0) {
			    foreach($deleted_module as $key	=> $value) {
				    if($this->delete($key)) {
					    $this->delete_by_parent_id($key);
					    
					    $where_cond	= array('module_id'	=> $key);
					    
					    $model_list	= $this->ModelLists->getByModuleId($key);
					    
					    if(is_array($model_list) && count($model_list) != 0) {
						    foreach($model_list as $model) {
							    $model_name	= $model->model;
							    if ($this->db->table_exists($model_name)) 
								    $this->db->query('DROP TABLE `'.$model_name.'`'); // $this->db->query('DROP TABLE `'.$model_name.'`');	
						    }							 
					    }

					    // Load ModuleLists, ModelLists and ModulePermissions models
	    				$this->ModelLists->delete_by_module_id($key);
					    $this->ModulePermissions->delete_by_module_id($key);
					    $this->UserGroupPermissions->delete_by_permission_id($key);

					    if ($this->db->table_exists($value)) 
						    $this->db->query('DROP TABLE `'.$value.'`'); //$this->db->query('DROP TABLE `'.$value.'`');	

				    }
			    }
		    }

	    }
						
	}
	
	public function delete ($id = '') {
		if ($id == '')
			return false;

		// Check module id
		$this->db->where('id', $id);
		
		// Delete modulelists form database
		return $this->db->delete($this->table);
	}

	public function delete_by_parent_id ($parent_id = '') {
		if ($parent_id == '')
			return false;

		// Check user id
		$this->db->where('parent_id', $parent_id);
		
		// Delete modulelists form database
		return $this->db->delete($this->table);
	}

	public function emptyPermission() {
		$this->db->query('TRUNCATE `group_permissions`;');
		$this->db->query('TRUNCATE `model_lists`;');
		$this->db->query('TRUNCATE `module_lists`;');
		$this->db->query('TRUNCATE `module_permissions`;');
	}

}