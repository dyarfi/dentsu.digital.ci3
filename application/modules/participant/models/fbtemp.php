<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Facebook Temp Data
class Fbtemp Extends MY_Model {
    
	// Table name for this model
	public $table = 'fb_temp';
	
	public function __construct(){
	    // Call the Model constructor
	    parent::__construct();

	    $this->db = $this->load->database('default', true);

	    // Set default table
	    $this->table = $this->db->dbprefix($this->table);
				
	}
	
	public function install() {
		
	    $insert_data	= FALSE;

	    if (!$this->db->table_exists($this->table)) 
	    $insert_data	= FALSE;
	    
	    $sql	= 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
			    . '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, '
			    . '`user_id` INT(11) UNSIGNED NULL, '
			    . '`fb_id` VARCHAR(255) NULL, '
			    . '`fb_name` VARCHAR(255) NULL, '
			    . '`fb_email` VARCHAR(255) NULL, '
			    . '`fb_pic` VARCHAR(512) NULL, '
			    . '`added` INT(11) NULL, '
			    . '`modified` INT(11) NULL, '
			    . 'INDEX (`fb_id`) '
			    . ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';

	    $this->db->query($sql);

	    if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0 , 1;'))
		    $insert_data	= TRUE;

	    if ($insert_data) {
		$sql	= '';
		if ($sql) $this->db->query($sql);
	    }

	    return $this->db->table_exists($this->table);
		
	}
	
	public function getCount($status = null){
	    $data = array();
	    $options = array('status' => $status);
	    $this->db->where($options,1);
	    $this->db->from($this->table);
	    $data = $this->db->count_all_results();
	    return $data;
	}
	
	public function getFbtemp($id = null){
	    if(!empty($id)){
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
	
	public function getAllFbtemp($admin=null){
	    $data = array();
	    $this->db->order_by('added');
	    $Q = $this->db->get($this->table);
	    if ($Q->num_rows() > 0){
		//foreach ($Q->result_object() as $row){
			//$data[] = $row;
		//}
		$data = $Q->result_object();
	    }
	    $Q->free_result();
	    return $data;
	}	
	
	public function setFbtemp($object=null){

	    // Set Facebook data
	    $data = array(	
		    'user_id'   => $object['user_id'],
		    'fb_id'	=> $object['fb_id'],
		    'fb_name'	=> $object['fb_name'],
		    'fb_email'	=> $object['fb_email'],
		    'fb_pic'    => $object['fb_pic'],
		    'added'	=> time(),	
		    'modified'  => $object['status']
	    );

	    // Insert Image data
	    $this->db->insert($this->table, $data);

	    // Return last insert id primary
	    $insert_id = $this->db->insert_id();

	    // Return last insert id primary
	    return $insert_id;
		
	}	
	
	// Delete Participant
	public function deleteFbtemp($id) {
		
	    // Check Participant id
	    $this->db->where('id', $id);

	    // Delete Participant form database
	    return $this->db->delete($this->table);		
	}	
}
