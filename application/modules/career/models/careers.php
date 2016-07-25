<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Careers
class Careers Extends MY_Model {
	// Table name for this model
	public $table = 'careers';
	
	public function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->_model_vars	= array(
						    'id'		=> 0,
						    'division_id'	=> 0,
						    'name'		=> '',
						    'subject'		=> '',
						    'ref_no'		=> '',
						    'sent_to'		=> '',
						    'start_date'	=> '',
						    'end_date'		=> '',
						    'report_to'		=> '',
						    'job_purpose'	=> '',
						    'responsibilities'	=> '',
						    'requirements'	=> '',
						    'location'		=> '',
						    'company'		=> '',
						    'ext_link1'		=> '',
						    'ext_link2'		=> '',
						    'allow_comment'	=> '',
						    'user_id'		=> 0,
						    'count'		=> 0,
						    'status'		=> '',
						    'added'		=> 0,
						    'modified'		=> 0);
		
		$this->db = $this->load->database('default', true);	
		
		// Set default table
		$this->table = $this->db->dbprefix($this->table);
				
	}
	
	public function install() {
		
		$insert_data	= FALSE;

		if (!$this->db->table_exists($this->table)) 
                $insert_data	= TRUE;
                
		$sql	= 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
				. '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, '
				. '`division_id` INT(11) UNSIGNED NULL, '
				. '`name` VARCHAR(255) NULL, '
				. '`subject` VARCHAR(255) NULL, '
				. '`ref_no` VARCHAR(12) NULL, '
				. '`sent_to` VARCHAR(32) NULL, '
				. '`start_date` DATE NULL DEFAULT \'0000-00-00\', '
				. '`end_date` DATE NULL DEFAULT \'0000-00-00\', '
				. '`report_to` TINYTEXT NULL, '
				. '`job_purpose` TEXT NULL, '
				. '`responsibilities` TEXT NULL, '
				. '`requirements` TEXT NULL, '
				. '`location` VARCHAR(128) NULL, '
				. '`company` VARCHAR(128) NULL, '
				. '`ext_link1` VARCHAR(324) NULL, '
				. '`ext_link2` VARCHAR(324) NULL, '
				. '`allow_comment` TINYINT(1) NOT NULL, '			
				. '`user_id` TINYINT(3) NULL , '
				. '`count` INT(11) NULL , '		
				. '`status` TINYINT(1) NULL , '
				. '`added` INT(11) UNSIGNED NULL, '
				. '`modified` INT(11) UNSIGNED NULL, '
				. 'INDEX (`name`, `ref_no`) '
				. ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';
				
				
		$this->db->query($sql);
		
        if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0, 1;'))
			$insert_data	= TRUE;
		
		/*
		if ($insert_data) {
			$sql	= 'INSERT INTO `'.$this->table.'` (`id`, `division_id`, `name`, `sent_to`, `ref_no`, `start_date`, `end_date`, `synopsis`, `qualification`, `location`, `language`, `status`, `is_deleted`, `added`, `modified`)'
				    . ' VALUES '
				    . '(1, 13, \'Web Developer\', \'defrian@webarq.com\', \'234210\', 0, 0, \'Synopsis\', \'Qualification\', \'\', \'indonesia\', \'publish\', 0, '.time().', 1336032870),'
				    . '(2, 13, \'Web Designer\', \'defrian@webarq.com\', \'234211\', 0, 0, \'Synopsis\', \'Qualification\', \'\', \'english\', \'publish\', 0, '.time().', 1336032823);';

			$this->db->query($sql);
		}
		*/

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
	public function getCareer($id = null){
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
	public function getCareerByName($name = null){
		if(!empty($name)){
			$data = array();
			$options = array('name' => $name);
			$Q = $this->db->get_where($this->table,$options,1);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data = $row;
			}
			$Q->free_result();
			return $data;
		}
	}
	public function getAllCareer($param=null){
		$data = array();
		$this->db->order_by('added');


		if(!empty($param)){
			$options = array($param);
			$Q = $this->db->get_where($this->table,$options);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data = $row;
			}
			$Q->free_result();
			return $data;
		} else {
			$Q = $this->db->get($this->table);
			if ($Q->num_rows() > 0){
				//foreach ($Q->result_object() as $row){
					//$data[] = $row;
				//}
				$data = $Q->result_object();
			}			
		}

		$Q->free_result();

		return $data;
	}
	public function setCareer($object=null){
		
		// Set User data
		$data = array(			
				'parameter' => $object['username'],
				'alias' => $object['alias'],
				'value' => $object['value'],
				'is_system' => $object['is_system'],
				'added'		=> time(),	
				'status' => $object['status']
			    );
		
		// Insert User data
		$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		$insert_id = $this->db->insert_id();					
			
		// Return last insert id primary
		return $insert_id;
		
	}	
	public function deleteCareer($id) {
		
		// Check Career id
		$this->db->where('id', $id);
		
		// Delete setting form database
		return $this->db->delete($this->table);
		
	}	
}
