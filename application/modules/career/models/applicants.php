<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Applicants
class Applicants Extends MY_Model {
	// Table name for this model
	public $table = 'applicants';
	
	public function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->_model_vars	= array(
						'id'			=> 0,
						'career_id'		=> 0,
						'user_id'		=> 0,
						'name'			=> '',
						'email'			=> '',
						'gender'		=> '',
						'marital_status'	=> '',
						'id_number'		=> '',
						'phone'			=> '',
						'address'		=> '',
						'birth_date'		=> '',
						'birth_place'		=> '',
						'education_grade'	=> '',
						'education_name'	=> '',
						'education_major'	=> '',
						'education_from'	=> 0,
						'education_to'		=> 0,
						'employment_name'	=> '',
						'employment_position'	=> '',
						'employment_from'	=> 0,
						'employment_to'		=> 0,
						'photo'			=> '',
						'cv_file'		=> '',
						'is_located'		=> 0,
						'is_related'		=> 0,
						'messages'		=> '',
						'available_date'	=> '',
						'expected_salary'	=> '',
						'status'		=> '',
						'added'			=> 0,
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
				.'`id` int(11) NOT NULL AUTO_INCREMENT, '
				.'`career_id` int(11) NOT NULL, '
				.'`user_id` int(11) NOT NULL, '
				.'`name` varchar(128) NOT NULL, '
				.'`email` varchar(64) NOT NULL, '
				.'`gender` tinyint(1) NOT NULL, '
				.'`marital_status` tinyint(1) NOT NULL, '
				.'`id_number` varchar(128) NOT NULL, '
				.'`phone` varchar(18) NOT NULL, '
				.'`address` varchar(512) NOT NULL, '
				.'`birth_date` int(11) NOT NULL, '
				.'`birth_place` char(32) NOT NULL, '
				.'`education_grade` varchar(128) NOT NULL, '
				.'`education_name` varchar(128) NOT NULL, '
				.'`education_major` varchar(128) NOT NULL, '
				.'`education_from` int(11) NOT NULL, '
				.'`education_to` int(11) NOT NULL, '
				.'`employment_name` int(11) NOT NULL, '
				.'`employment_position` int(11) NOT NULL, '
				.'`employment_from` int(11) NOT NULL, '
				.'`employment_to` int(11) NOT NULL, '
				.'`photo` varchar(256) NOT NULL, '
				.'`cv_file` varchar(256) NOT NULL, '
				.'`is_located` tinyint(1) NOT NULL, '
				.'`is_related` tinyint(1) NOT NULL, '
				.'`messages` TEXT NULL, '
				.'`available_date` int(11) NOT NULL, '
				.'`expected_salary` int(11) NOT NULL, '
				.'`status` ENUM(\'publish\', \'unpublish\', \'deleted\') NULL DEFAULT \'publish\', '
				.'`added` int(11) NOT NULL, '
				.'`modified` int(11) NOT NULL, '
				.'PRIMARY KEY (`id`) '
				//.'UNIQUE KEY `name` (`name`) '
				.') ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';
				
				
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
	public function getApplicant($id = null){
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
	public function getByParameter($param = null){
		if(!empty($param)){
			$data = array();
			$options = array('parameter' => $email);
			$Q = $this->db->get_where($this->table,$options,1);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data = $row;
			}
			$Q->free_result();
			return $data;
		}
	}
	public function getAllApplicant($status=null){
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
	public function setApplicant($object=null){
		
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
	public function setEmployeeId($object=null){
		
		// Set User data
		$data = array(			
				'user_id' => $object->user_id,
				'modified'=> time(),
				'status'=> 1,
			    );
		
		// Check Applicant id
		$this->db->where('id', $object->id);
		
		// Update User data
		return $this->db->update($this->table, $data);
		
	}
	public function deleteApplicant($id) {
		
		// Check Applicant id
		$this->db->where('id', $id);
		
		// Delete setting form database
		return $this->db->delete($this->table);
		
	}	
}
