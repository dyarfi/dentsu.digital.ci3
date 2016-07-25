<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for User Group
class UserGroups Extends MY_Model {

	// Table name for this model
	public $table = 'user_groups';

	// Set model primary key
	public $primary_key = 'id';

	// Belong to and has many relationship
    public $has_many = ['users' => [
							// Set relation Model
							'model' => 'Users',
							// Set Foreign Key to primary key
							'primary_key'=>'group_id']
						]; 

	// Simply set $soft_delete to be TRUE and rows will magically be marked as deleted
	public $soft_delete = TRUE;	
	
	public function __construct() {
	    // Call the Model constructor		
		parent::__construct();

	    // Load other necesseray model
	    $this->load->model('Users');
	    
	    // Set default db
	    $this->db = $this->load->database('default', true);		
	    // Set default table
	    $this->table = $this->db->dbprefix($this->table);	
		// Set private MY_Model table name
		$this->_table = $this->table;

	}
	
	public function install () {
		$insert_data		= FALSE;
		
		if (!$this->db->table_exists($this->table)) {
			$insert_data	= TRUE;

			$sql	= 'CREATE TABLE IF NOT EXISTS `'. $this->table .'` ('
					. '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, '
					. '`name` VARCHAR(32) NOT NULL, '
					. '`backend_access` TINYINT(1) NULL, '
					. '`full_backend_access` TINYINT(1) NULL, '
					. '`status` TINYINT(1) NOT NULL, '
					. '`is_system` TINYINT(1) NOT NULL DEFAULT 0, '
					. '`added` INT(11) UNSIGNED NOT NULL, '
					. '`modified` INT(11) UNSIGNED NOT NULL, '
					. 'INDEX (`name`) '
					. ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';
	
			$this->db->query($sql);
		}

		if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0, 1;')) {
			$insert_data	= TRUE;
		}
        
		if ($insert_data) {
                    $sql    = 'INSERT INTO `'. $this->table .'` '
                            . '(`id`, `name`, `backend_access`, `full_backend_access`, `status`, `is_system`, `added`, `modified`) '
                            . 'VALUES '
                            . '(\'1\', \'Super Administrator\', \'1\', \'1\', \'1\', \'1\', '.time().' , 0), '
                            . '(\'2\', \'Administrator\', \'1\', \'0\', \'1\', \'1\', '.time().' , 0), '
                            . '(\'99\', \'User\', \'0\', \'0\', \'1\', \'1\', '.time().' , 0), '
                            . '(\'100\', \'Employee\', \'0\', \'0\', \'1\', \'1\', '.time().' , 0);';

                    if ($sql) $this->db->query($sql);
		}
		
		return $this->db->table_exists($this->table);
	}
	
	public function getUserGroup($id = null){
	    if(!empty($id)) {
		$data = array();
		$options = array('id' => $id);
		$Q = $this->db->get_where($this->table,$options,1);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_object() as $row)
			$data = $row;
		}
		$Q->free_result();
		return $data;
	    }
	}
	
	public function getAllUserGroup(){
	    $data = array();
	    $this->db->order_by('added');
	    $Q = $this->db->get($this->table);
		if ($Q->num_rows() > 0){
		    //foreach ($Q->result_array() as $row){
			    //$data[] = $row;
		    //}
		    $data = $Q->result_object();
		}
	    $Q->free_result();
	    return $data;
	}
	
	public function getGroupName_ById($id = null){
	    $data = '';
	    $options = array('id' => $id);
	    $Q = $this->db->get_where($this->table,$options,1);

	    if ($Q->num_rows() > 0){
		    foreach ($Q->result_object() as $row)
			    $data = $row->name;
	    }
	    $Q->free_result();
	    return $data;
	}
	
	public function setUserGroup($object=null){
				
	    $data = array(
	    'name' => $object['name'],
	    'backend_access' => @$object['backend_access'],	
	    'full_backend_access' => @$object['full_backend_access'],			
	    'status' => $object['status'],
            'added' => time(),
	    );

	    $this->db->insert($this->table, $data);
		
	}
	
	public function setStatus($id=null,$status=null) {
	   
	    //Get user id
	    $this->db->where('id', $id);
	    
	    //Return result
	    return $this->db->update($this->table, array('status'=>$status,'modified'=>time()));

	}
	
	public function updateUserGroup($object=null){
	    $data = array(
	    'name' => $object['name'],
	    'backend_access' => @$object['backend_access'],	
	    'full_backend_access' => @$object['full_backend_access'],			
	    'status' => $object['status'],
	    'modified' => time()
	    );
	    $this->db->where('id', $object['id']);
	    return $this->db->update($this->table, $data);
	}
	
	public function deleteUserGroup($id){
	    $this->db->where('id', $id);
	    return $this->db->delete($this->table);
	}
}
