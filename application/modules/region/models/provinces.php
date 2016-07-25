<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Province
class Provinces extends MY_Model {
	
	// Table name for this model
	public $table = 'provinces'; 
	
	public function __construct () {
		parent::__construct();

		$this->_model_vars	= array('id'			=> 0,
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
	
	public function getProvince($id = null){
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
	
	public function getAllProvince($admin=null){
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
	
	public function setProvince($object=null){
		
		// Set Province data
		$data = array(			
			'name'			=> $object['name'],
			'added'			=> time(),	
			'modified'		=> $object['status']
		);
		
		// Insert Province data
		$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		$insert_id = $this->db->insert_id();
			
		// Return last insert id primary
		return $insert_id;
		
	}	
	
	// Delete Province
	public function deleteProvince($id) {
		
		// Check Province id
		$this->db->where('id', $id);
		
		// Delete Province form database
		return $this->db->delete($this->table);		
	}
	
}

