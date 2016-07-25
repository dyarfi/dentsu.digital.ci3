<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Questionnairecompleted
class QuestionnaireCompleted Extends MY_Model {
    
	// Table name for this model
	public $table = 'questionnaire_completed';
	
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
				. '`participant_id` INT(11) NULL , '
				. '`questionnaire_id` INT(11) NULL , '	
				. '`text` TEXT NULL , '	
				. '`date_completed` INT(11) NULL , '	
				. '`status` TINYINT(1) NULL DEFAULT 1, '
				. '`added` INT(11) NULL, '
				. '`modified` INT(11) NULL, '
				. 'INDEX (`participant_id`) '
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
	
	public function getUserComplete($id = null){
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

	public function getUserCompletedQuestionnaire($participant_id = null){
		if(!empty($participant_id)){
			$data = array();
			$options = array('participant_id' => $participant_id);
			$Q = $this->db->get_where($this->table,$options);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data['questionnaire_id'][] = $row->questionnaire_id;
			}
			$Q->free_result();
			return $data;
		}
	}	
	
	public function getAllUserComplete($admin=null){
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
	
	public function setUserCompletedQuestionnaire($object=null){

		if (is_array($object)) {
			foreach ($object['questionnaire_id'] as $key => $value) {
				$data['participant_id']	  = $object['participant_id'];
				$data['questionnaire_id'] = $value;
				$data['date_completed']	  = time();
				$data['status']		= 1;
				$data['added']		= time();
				$data['modified']	= time();
				$this->db->insert($this->table, $data);
			}
			return true;
		}
		
		/*
		// Set Questionnairecompleted data
		$data = array(			
			'participant_id'	=> $object['participant_id'],
			'questionnaire_id'	=> $object['questionnaire_id'],
			'date_completed'	=> time(),
			'status'			=> 1,
			'added'				=> time(),	
			'modified'			=> $object['modified']
		);
		*/

		// Insert Questionnairecompleted data
		//$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		//$insert_id = $this->db->insert_id();
			
		// Return last insert id primary
		//return $insert_id;
		
	}	

	public function getUserQuestionnaireCompleted($participant_id) {
		if(!empty($participant_id)){
			$data = array();
			$options = array('participant_id' => $participant_id);
			$Q = $this->db->get_where($this->table,$options);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data[] = $row;
			}
			$Q->free_result();
			return $data;
		}
	}
	
	// Delete Questionnairecompleted
	public function deleteUserComplete($id) {
		
		// Check Questionnairecompleted id
		$this->db->where('id', $id);
		
		// Delete Questionnairecompleted form database
		return $this->db->delete($this->table);		
	}	
}
