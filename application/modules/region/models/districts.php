<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for District
class Districts extends MY_Model {
	
	// Table name for this model
	public $table = 'districts'; 

	public function __construct () {
		parent::__construct();

		$this->_model_vars	= array('id'			=> 0,
									'sub_urban_id'          => 0,
									'name'			=> '',
									'added'			=> 0,
									'modified'		=> 0);

		$this->db = $this->load->database('default', true);
		
		// Set default table
		$this->table = $this->db->dbprefix($this->table);
	}

	public function install () {
		$sql	= 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
				. '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, '
				. '`sub_urban_id` INT(11) NULL, '
				. '`name` VARCHAR(255) NULL, '	
				. '`added` INT(11) NULL, '
				. '`modified` INT(11) NULL, '
				. 'INDEX (`name`) '
				. ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';

		$this->db->query($sql);

		return $this->db->table_exists($this->table);
	}
	
	public function getCount($status = null){
		$data = array();
		$options = array('id !=' => 0);
		$this->db->where($options,1);
		$this->db->from($this->table);
		$data = $this->db->count_all_results();
		return $data;
	}
	
	public function getDistrict($id = null){
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
        
	public function getBySubUrban () {
		if(!empty($id)){
				$data = array();
				$options = array('sub_urban_id' => $id);
				$Q = $this->db->get_where($this->table,$options);
				if ($Q->num_rows() > 0){
						//foreach ($Q->result_object() as $row)
						//$data = $row;
						$data = $Q->result_object();
				}
				$Q->free_result();
				return $data;
		}	
	}
        
	public function getAllDistrict($admin=null){
		$data = array();
		$this->db->order_by('name','asc');
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
	
	public function setDistrict($object=null){
		
		// Set Province data
		$data = array(			
			'name'          => $object['name'],
			'sub_urban_id'  => $object['sub_urban_id'],
			'added'         => time(),	
			'modified'      => $object['status']
		);
		
		// Insert Province data
		$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		$insert_id = $this->db->insert_id();
			
		// Return last insert id primary
		return $insert_id;
		
	}	
	
	// Delete Province
	public function deleteDistrict($id) {
		
		// Check Province id
		$this->db->where('id', $id);
		
		// Delete Province form database
		return $this->db->delete($this->table);		
	}
}

