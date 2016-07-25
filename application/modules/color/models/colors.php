<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Colors
class Colors Extends MY_Model {
    
	// Table name for this model
	public $table = 'colors';
	
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
				. '`name` VARCHAR(255) NULL, '
				. '`text` TEXT NULL, '
				. '`serial` TEXT NULL, '
				. '`file_name` VARCHAR(512) NULL, '
				. '`color_url` VARCHAR(512) NULL, '
				. '`order` TINYINT(3) NULL, '
				. '`user_id` INT(11) NULL , '
				. '`count` INT(11) NULL , '	
				. '`status` TINYINT(1) NULL DEFAULT 1, '
				. '`added` INT(11) NULL, '
				. '`modified` INT(11) NULL, '
				. 'INDEX (`name`) '
				. ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';

		$this->db->query($sql);
		
        if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0 , 1;'))
			$insert_data	= TRUE;
		
		if ($insert_data) {
			$sql	= '';

			$this->db->query($sql);
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
	
	public function getColor($id = null){
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
	
	public function getAllColor($admin=null){
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
	
	public function getValuesColors() {
		$data = array();
		$this->db->where('status',1);
		$Q = $this->db->get('colors');
		if ($Q->num_rows() > 1) {
			foreach($Q->result_object() as $row){
				$data[$row->id] = $row->serial;
			}
		}
		return $data;
	}

	public function setColor($object=null){
		
		// Set Color data
		$data = array(			
			'name'			=> $object['name'],
			'text'			=> $object['text'],
			'serial'		=> $object['serial'],
			'file_name'	=> $object['file_name'],
			'color_url' => $object['color_url'],
			'order'			=> $object['order'],
			'user_id'		=> $object['user_id'],
			'count'			=> $object['count'],
			'status'		=> $object['status'],
			'added'			=> time(),	
			'modified'		=> $object['status']
		);
		
		// Insert Color data
		$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		$insert_id = $this->db->insert_id();
			
		// Return last insert id primary
		return $insert_id;
		
	}	
	
	// Delete Color
	public function deleteColor($id) {
		
		// Check Color id
		$this->db->where('id', $id);
		
		// Delete Color form database
		return $this->db->delete($this->table);		
	}	
}
