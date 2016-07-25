<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Modulel Permission
class ModulePermissions Extends MY_Model {
	// Table name for this model
	public $table = 'module_permissions';
	
	public function __construct(){
	    // Call the Model constructor
	    parent::__construct();

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
					. '`module_id` INT(11) NOT NULL,'
					. '`module_name` VARCHAR(255) NOT NULL, '
					. '`module_link` VARCHAR(255) default NULL, '
					. '`order` INT(11) NOT NULL,'
					. 'INDEX (`id`) '
					. ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';
	
			if ($sql) $this->db->query($sql);
		}
		
		return $this->db->table_exists($this->table);
	}
	
	public function delete_by_module_id ($module_id = '') {

		if ($module_id == '')
			return false;

		// Check module id
		$this->db->where('module_id', $id);
		
		// Delete modulelists form database
		return $this->db->delete($this->table);

	}
}